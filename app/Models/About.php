<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class About extends Model
{
    use HasFactory;
    
    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'self_image',
        'title',
        'sub_title',
        'leader_name',
        'leader_designation',
        'company_name',
        'our_mission',
        'complete_projects',
        'happy_clients',
        'skills_experts',
        'media_posts',
    ];

    // Function to upload and resize image
    private static function getImageUrl($request)
    {
        self::$image = $request->file('self_image');
        if (self::$image) {
            self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
            self::$directory = "upload/about-images/";
            self::$image->move(self::$directory, self::$imageName);

            // Resize the image using Intervention Image
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read(self::$directory . self::$imageName);
            $image->resize(1200, 600); // Resize to required dimensions
            $image->save(self::$directory . self::$imageName);

            self::$imageUrl = self::$directory . self::$imageName;
            return self::$imageUrl;
        }
        return null;
    }

    // Create a new About entry
    public static function newAbout($request)
    {
        self::$imageUrl = $request->file('self_image') ? self::getImageUrl($request) : '';

        $about = new self();
        self::saveBasicInfo($about, $request, self::$imageUrl);
    }

    // Update an existing About entry
    public static function updateAbout($request, $about)
    {
        if ($request->file('self_image')) {
            if (file_exists($about->self_image)) {
                unlink($about->self_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $about->self_image;
        }

        self::saveBasicInfo($about, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($about, $request, $imageUrl)
    {
        $about->self_image = $imageUrl;
        $about->title = $request->title;
        $about->sub_title = $request->sub_title;
        $about->leader_name = $request->leader_name;
        $about->leader_designation = $request->leader_designation;
        $about->company_name = $request->company_name;
        $about->our_mission = $request->our_mission;
        $about->complete_projects = $request->complete_projects ?? 0;
        $about->happy_clients = $request->happy_clients ?? 0;
        $about->skills_experts = $request->skills_experts ?? 0;
        $about->media_posts = $request->media_posts ?? 0;
        $about->save();
    }

    // Delete an About entry
    public static function deleteAbout($about)
    {
        if (file_exists($about->self_image)) {
            unlink($about->self_image);
        }
        $about->delete();
    }
}
