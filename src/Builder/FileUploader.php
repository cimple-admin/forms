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
    private string $uploadUrl;

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

        return $params;
    }
}
