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
            $fileExt = '';
            foreach ($request->file('file') as $file) {
                // 先将所有分块集中存储
                $explodeOriginFileName = explode('.', $file->getClientOriginalName());
                if (empty($fileExt) && isset($explodeOriginFileName[1])) {
                    $fileExt = $explodeOriginFileName[1];
                }
                $uploadSuccess = Storage::putFileAs('chunk/'.$fileName, $file, 'chunk-' . sprintf('%0' . mb_strlen($chunkCount) . 'd', $chunkIndex));

//                if ($chunkIndex == 0) {
//                    $uploadSuccess = Storage::put('upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), $file->get());
//                } else {
//                    $uploadSuccess = Storage::append('upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), $file->get(), null);
//                }
//                 当所有文件都上传后，合并全部文件
                $allChunkFiles = Storage::allFiles('chunk/'.$fileName);
                if (count($allChunkFiles) == $chunkCount) {
                    foreach ($allChunkFiles as $chunkFile) {
                        Storage::append('upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''), Storage::get($chunkFile), null);
                    }
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
