<?php

namespace CimpleAdmin\Forms\Builder;

class WangEditor extends Component
{
    const COMPONENT_NAME = 'wang-editor';

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
