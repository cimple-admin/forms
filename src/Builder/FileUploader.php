<?php

namespace CimpleAdmin\Forms\Builder;

class FileUploader extends Component
{
    const COMPONENT_NAME = 'file-uploader';

    private int $chunkSize; // 分块大小
    private int $maxFileSize; // 最大文件大小
    private string $uploadUrl;

    public function chunkSize($chunkSize): static
    {
        $this->chunkSize = $chunkSize;

        return $this;
    }

    /**
     * @param $maxFileSize
     * @return $this
     */
    public function maxFileSize($maxFileSize): static
    {
        $this->maxFileSize = $maxFileSize / 1024 / 1024;

        return $this;
    }

    public function uploadUrl($uploadUrl): static
    {
        $this->uploadUrl = $uploadUrl;

        return $this;
    }

    public function build(): array
    {
        $params = parent::build();
        $params['chunkSize'] = $this->chunkSize ?? 5 * 1024 * 1024;
        $params['maxFileSize'] = $this->maxFileSize ?? 200;
        $params['uploadUrl'] = $this->uploadUrl ?? '/cimple-admin/form/file/upload';

        return $params;
    }
}
