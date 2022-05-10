<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
class FileController extends Controller
{
    public function deleteImage($url)
    {
        try {
            unlink("../public".$url);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    public function uploadImage($image)
    {
        try {
            $image_name = Str::random(40). $image ->getClientOriginalName();
            $move_name = "/uploads/sports/".$image_name;
            $image -> move("uploads/sports",$image_name);
            return $move_name;
        }
        catch (\Throwable $th) {
            return false;
        }

    }
}
