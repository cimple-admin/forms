<?php

namespace CimpleAdmin\Forms\Components;

class FileUploader extends BaseComponent
{
    public int $chunkSize;
    public int $maxFileSize;

    protected string $viewName = 'form::file-uploader';
}
