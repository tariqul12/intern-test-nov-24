<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    private static $image,$newImage,$extension,$newName,$directory;
    public static function newImage($request)
    {
        self::$image            = new Image();
        self::$newImage         =  $request->file('image');
        self::$extension        =  self::$newImage->getClientOriginalExtension();
        self::$newName          = rand(10000,100000).".".self::$extension;
        self::$directory        = 'images/';
        self::$newImage->move(self::$directory,self::$newName);
        self::$image->filepath  = self::$directory.self::$newName;
        self::$image->save();
    }
}
