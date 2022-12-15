<?php

namespace CimpleAdmin\Forms\Controllers;

use Illuminate\Http\Request;

class FormsUpload
{
    public function upload(Request $request)
    {
        $file = $request->file('file');
        $uploadSuccess = $file->store('upload');
        if ($uploadSuccess) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
    }
}