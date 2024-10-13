<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class poem extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'Author_name', 'Author_designation', 'content', 'published_at'];

    

    public static function newPoems($request)
    {
        $poem = new poem();
        self::saveBasicInfo($poem, $request);
    }

    public static function updatePoems($request, $poem)
    {
        self::saveBasicInfo($poem, $request);
    }

    private static function saveBasicInfo($poem, $request)
    {

        $poem->title = $request->title;
        $poem->slug  = Str::slug($request->title, '-');
        $poem->Author_name = $request->Author_name;
        $poem->Author_designation = $request->Author_designation;
        $poem->content = $request->content;
        $poem->published_at = date('d-m-y');
        $poem->save();
    }

    public static function deletePoems($poem)
    {

        $poem->delete();
    }

}
