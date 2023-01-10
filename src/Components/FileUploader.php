<?php

namespace CimpleAdmin\Forms\Components;

class FileUploader extends BaseComponent
{
    public int $chunkSize;

    protected string $viewName = 'form::file-uploader';
}
