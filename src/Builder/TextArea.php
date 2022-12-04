<?php

namespace CimpleAdmin\Forms\Builder;

class TextArea extends Component
{
    const COMPONENT_NAME = 'textarea';

    public function build(): array
    {
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'value' => $this->value,
            'hiddenLabel' => $this->hiddenLabel,
        ];
    }
}
