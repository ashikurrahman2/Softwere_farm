<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Import Intervention Image Facade

class advertisement extends Model
{
    use HasFactory;
    private static $image, $imageName, $directory, $imageUrl;

    protected $fillable = ['title','image'];

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "upload/advertisement-images/";
        self::$image->move(self::$directory, self::$imageName);
        // Resize the image using Intervention Image
        //create new manager instance with desred driver
        $imageManager = new ImageManager(new Driver());
        //Reading Upload imageFrom Local File system (uploads)
        $imageUrl = $imageManager->read(self::$directory .self::$imageName);
        //Resize the image
        $imageUrl->resize(240, 240); // Resize to 2, adjust as needed
        $imageUrl->save(self::$directory. self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newAdvertisement($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : '';

        $advertisement = new advertisement();
        self::saveBasicInfo($advertisement, $request, self::$imageUrl);
    }

    public static function updateAdvertisement($request, $advertisement)
    {
        if ($request->file('image')) {
            if (file_exists($advertisement->image)) {
                unlink($advertisement->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $advertisement->image;
        }
        self::saveBasicInfo($advertisement, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($advertisement, $request, $imageUrl)
    {
        $advertisement->title = $request->title;
        $advertisement->image = $imageUrl;
        $advertisement->save();
    }

    public static function deleteAdvertisement($advertisement)
    {
        if (file_exists($advertisement->image)) {
            unlink($advertisement->image);
        }
        $advertisement->delete();
    }
}