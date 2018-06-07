<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Input as Input;

class PhotosController extends Controller
{

    public function upload(Request $request){
        if($request->hasFile('file')){
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $destinationPath = 'C:\laragon\www\laravel56-full\storage\app\public';
            $file->move($destinationPath, $name);
            echo 'Upload Complete'
		    }
    }
}
