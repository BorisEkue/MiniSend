<?php

namespace App\Helpers;

class Asset 
{
    public static function get_image_extension($image_name) {
        $array_split = explode(".", $image_name);
        return $array_split[count($array_split) - 1];
    }

    public static function get_files_location() {
        return (env("APP_ENV") == "local") ? "..\\public\\files\\" : "..\\public\\files\\";
    }
  
}