<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class MultImageSelectController extends Controller
{
    // テストでの作成
    public function MultImageSelectView()
    {
        $images = Image::all();
        return view('SampleImage.sampleimage', ['images' => $images]);
    }

    public function MultImageStore(Request $request)
    {
        $files = $request->file('file');
        //dd($files);
        foreach($files as $file)
        {
            if(isset($file)){
                $path = $file->store('images', 'public');
                Image::create([
                    'image_name' => $path
                ]);
            }
        }

        return redirect()->route('SampleImage.sampleimage');
    }
}
