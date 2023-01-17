<?php

namespace CimpleAdmin\Forms\Components;

class FileUploader extends BaseComponent
{
    public int $chunkSize;
    public int $maxFileSize;
    public string $buttonText;
    public int|null $maxFiles;
    public string $uploadUrl;
    public string $dictFallbackMessage;
    public string $dictFileTooBig;
    public string $dictInvalidFileType;
    public string $dictResponseError;
    public string $dictMaxFilesExceeded;
    public string $deleteUrl;
    public string $removeFileOnServer;

    protected string $viewName = 'form::file-uploader';
}
