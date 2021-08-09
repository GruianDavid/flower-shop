<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class GeneralHelper{
    //regenerate S3 images routes to fit backend views
    public static function image($file, $default = '')
    {
        if (!empty($file)) {
            $out = str_replace('\\', '/', Storage::disk(env('FILESYSTEM_DRIVER'))->url($file));
            $out = str_replace('%5C', '/', $out);
            return $out;
        }

        return $default;
    }
}
