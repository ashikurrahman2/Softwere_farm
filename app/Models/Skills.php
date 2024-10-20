<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'skills_name',
        'skills_percentage',
        'skills_experience',
    ];

     // Create a new About entry
     public static function newSkills($request)
     {
         $skills = new self();
         self::saveBasicInfo($skills, $request);
     }
 
     public static function updateSkills($request, $skills)
     {
         self::saveBasicInfo($skills, $request);
     }
 
     private static function saveBasicInfo($skills, $request)
     {
         $skills->skills_name        = $request->skills_name;
         $skills->skills_percentage  = $request->skills_percentage;
         $skills->skills_experience  = $request->skills_experience;
         $skills->save();
     }
 
     public static function deleteSkills($skills)
     {
         $skills->delete();
     }
}
