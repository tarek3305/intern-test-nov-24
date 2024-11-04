<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // Display form and images
    public function index()
    {
        $images = Image::all();
        return view('upload', compact('images'));
    }

    // Handle image upload
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->file('image')) {
            $imagePath = $request->file('image')->store('images', 'public');

            Image::create([
                'filepath' => $imagePath,
            ]);

            return redirect()->route('images.index')->with('success', 'Image uploaded successfully.');
        }

        return back()->withErrors(['image' => 'Please select a valid image file.']);
    }
}
