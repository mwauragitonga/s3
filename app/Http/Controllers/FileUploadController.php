<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        //make s3 visibility to true
       // Storage::disk("s3")->setVisibility("images/", "public");
        // $path_ = Storage::disk("local")->put('images', $request->image);
        // Log::info($path_);
        // $path = Storage::disk('s3')->url($path_);
       // Log::info($path);
        /* Store $imageName name in DATABASE from HERE */
        $file = $request->image;
        $path = $request->image->storeAs('images', $imageName, "s3");
        Log::info($path);
        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', 'https://axis-v2.s3.amazonaws.com/'. $path);
    }
}
