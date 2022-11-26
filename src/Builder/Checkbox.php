<?php

namespace CimpleAdmin\Forms\Builder;

class Checkbox extends Component
{
    const COMPONENT_NAME = 'checkbox';
    private array $options = [];

    public function __construct($property)
    {
        parent::__construct($property);
    }

    public function options($options): static
    {
        $this->options = $options;

        return $this;
    }

    public function build(): array
    {
        return [
            'rules' => $this->rules,
            'property' => $this->property,
            'label' => $this->label,
            'options' => $this->options,
            'value' => $this->value,
        ];
    }
}
