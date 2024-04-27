<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackgroundImageController extends Controller
{
    public function getSpecificImage($imageName)
    {
        // Check if the image exists in the directory
        if (Storage::exists('public/images/backgrounds/' . $imageName)) {
            // Get the URL of the image
            $imageUrl = asset(Storage::url('public/images/backgrounds/' . $imageName));

            // Return the image URL
            return $imageUrl;
        } else {
            // If the image does not exist, return a default image URL or handle it as per your application's requirements
            return null;
        }   
}
}
