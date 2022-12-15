<?php

namespace CimpleAdmin\Forms\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormsUpload
{
    public function upload(Request $request)
    {
        $uploadSuccess = false;
        if ($request->hasfile('file')) {
            $chunkIndex = $request->post('dzchunkindex');
            $fileName = $request->post('dzuuid');
            foreach ($request->file('file') as $file) {
                if ($chunkIndex == 0) {
                    $uploadSuccess = Storage::put('upload/'.$fileName.'.pdf', $file);
                } else {
                    $uploadSuccess = Storage::append('upload/'.$fileName.'.pdf', $file, null);
                }
            }
        }
        if ($uploadSuccess) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
    }
}
