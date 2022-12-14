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
            $chunkCount = $request->post('dztotalchunkcount');
            $file = $request->file('file');
            $explodeOriginFileName = explode('.', $file->getClientOriginalName());
            $fileExt = '';
            if (isset($explodeOriginFileName[1])) {
                $fileExt = $explodeOriginFileName[1];
            }
            // 先将所有分块集中存储
            if ($chunkIndex == 0) {
                $uploadSuccess = Storage::put('upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), $file->get());
            } else {
                $uploadSuccess = Storage::append('upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), $file->get(),
                    null);
            }
        }
        if ($uploadSuccess) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
    }
}
