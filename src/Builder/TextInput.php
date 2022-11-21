<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

class TextInput extends Component
{
    use Validation;

    const COMPONENT_NAME = 'input';
    private string $type = 'text';
    private string $label = '';
    private string $property = '';

    public function __construct($property)
    {
        $this->property = $property;
        $this->label = $property;
    }

    public static function make($property): TextInput
    {
        return new self($property);
    }

    public function label($label): static
    {
        $this->label = $label;
        return $this;
    }

    public function build(): array
    {
        return [
            'type' => $this->type,
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
        ];
    }
}