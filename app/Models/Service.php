<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Service extends Model
{
    use HasFactory;

    
    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'service_image',
        'service_title',
        'service_description',
    ];

    // Function to upload and resize image
    private static function getImageUrl($request)
    {
        self::$image = $request->file('service_image');
        if (self::$image) {
            self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
            self::$directory = "upload/service-images/";
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
    public static function newService($request)
    {
        self::$imageUrl = $request->file('service_image') ? self::getImageUrl($request) : '';

        $service = new self();
        self::saveBasicInfo($service, $request, self::$imageUrl);
    }

    // Update an existing About entry
    public static function updateService($request, $id)
    {
          // Fetch the team record using the ID
          $service = self::findOrFail($id);

        if ($request->file('service_image')) {
            if (file_exists($service->service_image)) {
                unlink($service->service_image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $service->service_image;
        }

        self::saveBasicInfo($service, $request, self::$imageUrl);
    }

    // Save or update basic info in the database
    private static function saveBasicInfo($service, $request, $imageUrl)
    {
        $service->service_image           = $imageUrl;
        $service->service_title           = $request->service_title;
        $service->service_description     = $request->service_description;
        $service->save();
    }

    // Delete an About entry
    public static function deleteService($service)
    {
        if (file_exists($service->service_image)) {
            unlink($service->service_image);
        }
        $service->delete();
    }
}
