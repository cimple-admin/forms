<?php

namespace CimpleAdmin\Forms\Builder;

class TextInput extends Component
{
    const COMPONENT_NAME = 'input-text';
    private string $type = 'text';

    public function __construct($property)
    {
        parent::__construct($property);
        $this->label = $property;
    }

    public static function make($property): self
    {
        return new self($property);
    }

    public function build(): array
    {
        return [
            'type' => $this->type,
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'hint' => $this->hint,
        ];
    }
}
