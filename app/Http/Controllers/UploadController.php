<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile(key:'img')) {
            $file = $request->file(key:'img');
            $filename =$file->getClientOriginalExtension();
            $filename = uniqid() . '-' . now()->timestamp . '.' . $filename;
            $file->storeAs('images/ads' ,$filename);

            return $filename;
        }
        return '';
    }
}
