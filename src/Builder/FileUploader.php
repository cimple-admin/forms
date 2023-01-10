<?php

namespace CimpleAdmin\Forms\Builder;

class FileUploader extends Component
{
    const COMPONENT_NAME = 'file-uploader';

    private int $chunkSize;

    public function chunkSize($chunkSize): static
    {
        $this->chunkSize = $chunkSize;

        return $this;
    }

    public function build(): array
    {
        $params = parent::build();
        $params['chunkSize'] = $this->chunkSize ?? 5 * 1024 * 1024;

        return $params;
    }
}
