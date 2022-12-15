<?php

namespace CimpleAdmin\Forms\Builder;

class FileUploader extends Component
{
    const COMPONENT_NAME = 'file-uploader';

    public function build(): array
    {
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'value' => $this->value,
        ];
    }
}
