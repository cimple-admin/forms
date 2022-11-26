<?php

namespace CimpleAdmin\Forms\Builder;

class PasswordInput extends Component
{
    const COMPONENT_NAME = 'input-password';

    public function build(): array
    {
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'hint' => $this->hint,
            'value' => $this->value,
        ];
    }
}
