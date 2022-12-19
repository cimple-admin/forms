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
            $chunkIndex = $request->post('chunk');
            $fileName = $request->post('name');
            $chunkCount = $request->post('chunks');
            $file = $request->file('file');
            Storage::append('upload/'.$fileName, $file->get(),
                null);
//            // 先将所有分块集中存储
//            Storage::putFileAs('chunk/'.$fileName, $file,
//                'chunk-'.sprintf('%0'.mb_strlen($chunkCount).'d', $chunkIndex));
//
//            // 当所有文件都上传后，合并全部文件
//            $allChunkFiles = Storage::allFiles('chunk/'.$fileName);
//            if (count($allChunkFiles) == $chunkCount) {
//                foreach ($allChunkFiles as $chunkFile) {
//                    Storage::append('upload/'.$fileName, Storage::get($chunkFile),
//                        null);
//                }
//                // 合并文件后，移除文件
//                Storage::deleteDirectory('chunk/'.$fileName);
//            }
        }

        return response()->json([
            'error' => 0,
        ]);
    }
}
