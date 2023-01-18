<?php

namespace CimpleAdmin\Forms\Builder;

class FileUploader extends Component
{
    const COMPONENT_NAME = 'file-uploader';

    private int $chunkSize; // 分块大小
    private int $maxFileSize; // 最大文件大小
    private string $buttonText = '点击或拖拽文件到此区域上传';
    private int|null $maxFiles = null;
    private string $dictFallbackMessage = '您的浏览器不支持拖放文件上传。';
    private string $dictFileTooBig = '文件太大 ({{filesize}}MiB). 最大文件大小: {{maxFilesize}}MiB.';
    private string $dictInvalidFileType = '您不能上传这种类型的文件。';
    private string $dictResponseError = '服务器响应 {{statusCode}} 代码。';
    private string $dictMaxFilesExceeded = '最多上传{{maxFiles}}个文件。';
    private string $uploadUrl;
    private string $deleteUrl = '/cimple-admin/form/file/delete';
    private bool $removeFileOnServer = false;
    private bool $autoUpload = true;

    public function chunkSize(int $chunkSize): static
    {
        $this->chunkSize = $chunkSize;

        return $this;
    }

    /**
     * @param $maxFileSize
     * @return $this
     */
    public function maxFileSize(int $maxFileSize): static
    {
        $this->maxFileSize = $maxFileSize / 1024 / 1024;

        return $this;
    }

    public function uploadUrl(string $uploadUrl): static
    {
        $this->uploadUrl = $uploadUrl;

        return $this;
    }

    public function buttonMessage(string $buttonMessage): static
    {
        $this->buttonText = $buttonMessage;

        return $this;
    }

    public function singleFile(): static
    {
        $this->maxFiles = 1;

        return $this;
    }

    public function maxFiles(int $maxFiles): static
    {
        $this->maxFiles = $maxFiles;

        return $this;
    }

    /**
     * 浏览器不支持拖拽错误信息.
     *
     * @param $dictFallbackMessage
     * @return $this
     */
    public function dictFallbackMessage($dictFallbackMessage): static
    {
        $this->dictFallbackMessage = $dictFallbackMessage;

        return $this;
    }

    /**
     * 上传文件超过限制大小错误信息.
     *
     * @param $dictFileTooBig
     * @return $this
     */
    public function dictFileTooBig($dictFileTooBig): static
    {
        $this->dictFileTooBig = $dictFileTooBig;

        return $this;
    }

    /**
     * 未验证的文件类型.
     *
     * @param $dictInvalidFileType
     * @return $this
     */
    public function dictInvalidFileType($dictInvalidFileType): static
    {
        $this->dictInvalidFileType = $dictInvalidFileType;

        return $this;
    }

    /**
     * 服务器上传错误提示.
     *
     * @param $dictResponseError
     * @return $this
     */
    public function dictResponseError($dictResponseError): static
    {
        $this->dictResponseError = $dictResponseError;

        return $this;
    }

    /**
     * 最多上传文件数错误提示.
     *
     * @param $dictMaxFilesExceeded
     * @return $this
     */
    public function dictMaxFilesExceeded($dictMaxFilesExceeded): static
    {
        $this->dictMaxFilesExceeded = $dictMaxFilesExceeded;

        return $this;
    }

    /**
     * 设置前段访问删除文件的时候同步删除后端的文件.
     *
     * @param $removeFileOnServer
     * @return $this
     */
    public function removeFileOnServer($removeFileOnServer): static
    {
        $this->removeFileOnServer = $removeFileOnServer;

        return $this;
    }

    /**
     * 设置删除文件的url，默认的url未经过任何认证，慎用。也许后期会更新.
     *
     * @param $deleteUrl
     * @return $this
     */
    public function deleteUrl($deleteUrl): static
    {
        $this->deleteUrl = $deleteUrl;

        return $this;
    }

    /**
     * 是否开启自动上传
     * @param $autoUpload
     * @return $this
     */
    public function autoUpload($autoUpload): static
    {
        $this->autoUpload = $autoUpload;

        return $this;
    }

    public function build(): array
    {
        $params = parent::build();
        $params['chunkSize'] = $this->chunkSize ?? 5 * 1024 * 1024;
        $params['maxFileSize'] = $this->maxFileSize ?? 200;
        $params['uploadUrl'] = $this->uploadUrl ?? '/cimple-admin/form/file/upload';
        $params['buttonText'] = $this->buttonText;
        $params['maxFiles'] = $this->maxFiles;
        $params['dictFallbackMessage'] = $this->dictFallbackMessage;
        $params['dictFileTooBig'] = $this->dictFileTooBig;
        $params['dictInvalidFileType'] = $this->dictInvalidFileType;
        $params['dictResponseError'] = $this->dictResponseError;
        $params['dictMaxFilesExceeded'] = $this->dictMaxFilesExceeded;
        $params['deleteUrl'] = $this->deleteUrl;
        $params['removeFileOnServer'] = $this->removeFileOnServer;
        $params['autoUpload'] = $this->autoUpload;

        return $params;
    }
}
