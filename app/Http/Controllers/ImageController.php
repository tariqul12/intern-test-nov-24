<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        return view('upload',['images'=>Image::latest()->get()]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpeg,png|max:2048',
        ], [
            'image.required' => 'Please upload a file.',
            'image.mimes' => 'Only JPEG and PNG files are allowed.',
            'image.max' => 'The file size cannot exceed 2MB.',
        ]);
        
    // File upload process
    if ($request->file('image')->isValid()) {
        Image::newImage($request);
        return back()->with('message','image Upload successfully');
    }
    return back()->with('message','File upload failed.');
    }
}
