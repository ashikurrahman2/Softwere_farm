<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class contact extends Model
{
    use HasFactory;
    private static $contacts;
    public static function newcontacts($request)
    {
        self::$contacts = new contact();
        self::saveBasicInfo(self::$contacts, $request);
    }

    public static function updatecontacts($request, $contacts)
    {
        self::saveBasicInfo($contacts, $request);
    }

    private static function saveBasicInfo($contacts, $request)
    {
        $contacts->contact_name      = $request->contact_name;
        $contacts->email             = $request->email;
        $contacts->phone             = $request->phone;
        $contacts->address           = $request->address;
        $contacts->save();
    }

    public static function deletecontacts($contacts)
    {
        $contacts->delete();
    }
}
