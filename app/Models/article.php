<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    protected $fillable = ['title','Author_name', 'Author_designation', 'content', 'published_at'];

    

    public static function newArticles($request)
    {
        $article = new article();
        self::saveBasicInfo($article, $request);
    }

    public static function updateArticles($request, $article)
    {
        self::saveBasicInfo($article, $request);
    }

    private static function saveBasicInfo($article, $request)
    {

        $article->title = $request->title;
        $article->Author_name = $request->Author_name;
        $article->Author_designation = $request->Author_designation;
        $article->content = $request->content;
        $article->published_at = date('d-m-y');
        $article->save();
    }

    public static function deleteArticles($article)
    {

        $article->delete();
    }

}
