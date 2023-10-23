<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function getImageUrl($imageFolder, $imagePath)
    {
        $imageRelativePath = $imageFolder . '/' . $imagePath;

        // Periksa apakah file gambar ada di penyimpanan publik
        if (Storage::exists('public/' . $imageRelativePath)) {
            $image = Storage::get('public/' . $imageRelativePath);
            $mimeType = Storage::mimeType('public/' . $imageRelativePath);

            return new Response($image, 200, [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'inline'
            ]);
        } else {
            return response()->json('Image not found', 404);
        }
    }
}
