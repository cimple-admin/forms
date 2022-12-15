<?php

use CimpleAdmin\Forms\Controllers\FormsUpload;
use Illuminate\Support\Facades\Route;

Route::post('/cimple-admin/form/file/upload', [FormsUpload::class, 'upload']);