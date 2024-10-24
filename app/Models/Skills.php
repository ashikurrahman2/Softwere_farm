<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;
    // Define any fillable fields or other attributes here, if necessary
    protected $fillable = ['skills_name']; 

    public static function newSkill($request)
    {
        $skill = new self();
        self::saveBasicInfo($skill, $request);
    }

    public static function updateSkill($request, $skill)
    {
        self::saveBasicInfo($skill, $request);
    }

    private static function saveBasicInfo($skill, $request)
    {
        $skill->skills_name  = $request->skills_name;
        $skill->save();
    }

    public static function deleteSkill($skill)
    {
        $skill->delete();
    }

    // Define the relationship with the Teams model
    public function teams()
    {
        return $this->hasMany(Teams::class, 'skills_id'); // Correct model name
    }

}
