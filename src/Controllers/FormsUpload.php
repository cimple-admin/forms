<?php

namespace CimpleAdmin\Forms\Controllers;

use Illuminate\Http\Request;

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
            if (count($explodeOriginFileName) >= 2) {
                $fileExt = $explodeOriginFileName[count($explodeOriginFileName) - 1];
            }
            $fileResource = fopen(storage_path('app').'/upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), 'a+');
            $uploadSuccess = fwrite($fileResource, $file->get());
            fclose($fileResource);
        }
        if ($uploadSuccess) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
    }
}
