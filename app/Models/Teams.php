<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class Teams extends Model
{
    use HasFactory;

    protected static $image, $imageName, $directory, $imageUrl;

    protected $fillable = [
        'image',
        'member_name',
        'member_details',
        'company_name',
        'designation',
        'skills_id',
    ];

    // Function to upload and resize image
    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "upload/team-images/";
        self::$image->move(self::$directory, self::$imageName);
        
        // Resize the image using Intervention Image
        // $imageManager = new ImageManager();
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read(self::$directory . self::$imageName); // Use make() instead of read()
        $image->resize(150, 150);
        $image->save(self::$directory . self::$imageName);

        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    // Create a new Team entry
    public static function newTeam($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : '';

        $team = new Teams();
        self::saveBasicInfo($team, $request, self::$imageUrl);
    }

    // Update an existing team
    public static function updateTeam($request, $id)
    {
        // Fetch the team record using the ID
        $team = self::findOrFail($id);
        if ($request->file('image')) {
            if (file_exists($team->image)) {
                unlink($team->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $team->image;
        }
        self::saveBasicInfo($team, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($team, $request, $imageUrl)
    {
        $team->member_name       = $request->member_name;
        $team->member_details    = $request->member_details;
        $team->company_name      = $request->company_name;
        $team->designation       = $request->designation;
        $team->skills_id         = $request->skills_id; 
        $team->image             = $imageUrl;
        $team->save();
    }

    // Delete a team
    public static function deleteTeam($team)
    {
        if (file_exists($team->image)) {
            unlink($team->image);
        }
        $team->delete();
    }

    public function skill() // This relationship is correctly defined
    {
        return $this->belongsTo(Skills::class, 'skills_id');
    }
}
