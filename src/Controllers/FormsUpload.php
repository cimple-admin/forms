<?php

namespace CimpleAdmin\Forms\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FormsUpload
{
    public function upload(Request $request): Response|Application|ResponseFactory
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
            if (! file_exists(storage_path('app').'/public/upload/')) {
                mkdir(storage_path('app').'/public/upload/', 0777, true);
            }
            $fileResource = fopen(storage_path('app').'/public/upload/'.$fileName.($fileExt ? ('.'.$fileExt) : ''),
                'a+');
            $uploadSuccess = fwrite($fileResource, $file->get());
            fclose($fileResource);
        }
        if ($uploadSuccess) {
            return response($fileName.($fileExt ? ('.'.$fileExt) : ''), 200);
        } else {
            return response('error', 400);
        }
    }

    public function delete(Request $request): Response|Application|ResponseFactory
    {
        $url = $request->get('url');
        $path = parse_url($url, PHP_URL_PATH);
        $path = substr($path, 8);
        Storage::delete('public/'.$path);

        return response('success');
    }
}
