<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Teams extends Model
{
    use HasFactory;

    private static $image, $imageName, $directory, $imageUrl;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'image',
        'member_name',
        'member_details',
        'company_name',
        'designation',
    ];

    // Function to upload and resize image
    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        if (self::$image) {
            self::$imageName = time() . '_' . self::$image->getClientOriginalName(); // Unique image name
            self::$directory = "upload/team-images/";
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
    public static function newTeam($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : '';

        $team = new self();
        self::saveBasicInfo($team, $request, self::$imageUrl);
    }

    // Update an existing About entry
    public static function updateTeam($request, $id)
    {
        // Fetch the team record using the ID
        $team = self::findOrFail($id);
    
        // Handle the image upload
        if ($request->file('image')) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $team->image;
        }
    
        // Save the updated team information
        self::saveBasicInfo($team, $request, self::$imageUrl);
    }
    

    // Save or update basic info in the database
    private static function saveBasicInfo($team, $request, $imageUrl)
    {
        $team->image = $imageUrl;
        $team->member_name = $request->member_name;
        $team->member_details = $request->member_details;
        $team->designation = $request->designation;
        $team->company_name = $request->company_name;
        $team->save();
    }

    // Delete an About entry
    public static function deleteTeam($team)
    {
        if (file_exists($team->image)) {
            unlink($team->image);
        }
        $team->delete();
    }
}
