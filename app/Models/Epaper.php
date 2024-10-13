<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class Epaper extends Model
{
    use HasFactory;
    protected $fillable = [            
         'paper_title','paper_slug','Paper_image', 'Paper_pdf', 'paper_date', 'paper_month', 'paper_year'
    ];

    private static $directory, $imageUrl, $pdfUrls;
    private static function getImageUrl($imageFile, $directory, $resizeWidth = null, $resizeHeight = null)
    {
        $imageName = hexdec(uniqid()) . '.' . $imageFile->getClientOriginalExtension();
        $imageFile->move($directory, $imageName);

        if ($resizeWidth && $resizeHeight) {
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($directory . $imageName);
            $image->resize($resizeWidth, $resizeHeight);
            $image->save($directory . $imageName);
        }

        return $directory . $imageName;
    }

    public static function newEpapers($request)
    {
        self::$directory = "upload/epaper/";
        
        if ($request->hasFile('Paper_image')) {
            self::$imageUrl = self::getImageUrl($request->file('Paper_image'), self::$directory, 595, 760);
        } else {
            self::$imageUrl = null;
        }

        if ($request->hasFile('Paper_pdf')) {
            self::$pdfUrls = self::getImageUrl($request->file('Paper_pdf'), self::$directory);
        }
        else {
            self::$pdfUrls = null;
        }

        $epaper = new Epaper();
        self::saveBasicInfo($epaper, $request, self::$imageUrl, self::$pdfUrls);
    }

    public static function updateEpapers($request, $epaper)
    {
        self::$directory = "upload/epaper/";

        if ($request->hasFile('Paper_image')) {
            if (file_exists($epaper->Paper_image)) {
                unlink($epaper->Paper_image);
            }
            self::$pdfUrls = self::getImageUrl($request->file('Paper_image'), self::$directory, 595, 760);
        } else {
            self::$pdfUrls = $epaper->Paper_image;
        }

        if ($request->hasFile('Paper_pdf')) {
            if (file_exists($epaper->Paper_pdf)) {
                unlink($epaper->Paper_pdf);
            }
            self::$pdfUrls = self::getImageUrl($request->file('Paper_pdf'), self::$directory);
        } else {
            self::$pdfUrls = $epaper->Paper_pdf;
        }

        self::saveBasicInfo($epaper, $request, self::$imageUrl, self::$pdfUrls);
    }

    private static function saveBasicInfo($epaper, $request, $imageUrl, $pdfUrls)
    {
        $epaper->paper_title = $request->paper_title;
        $epaper->paper_slug = Str::slug($request->paper_title, '-');
        $epaper->paper_image = $imageUrl;
        $epaper->paper_pdf = $pdfUrls;
        $epaper->paper_date = date('d-m-y');
        $epaper->paper_month = date('F');
        $epaper->paper_year  = date('Y');
        $epaper->save();
    }

    public static function deleteEpapers($epaper)
    {
        if (file_exists($epaper->paper_image)) {
            unlink($epaper->paper_image);
        }
        if (file_exists($epaper->Paper_pdf)) {
            unlink($epaper->Paper_pdf);
        }
        $epaper->delete();
    }

}
