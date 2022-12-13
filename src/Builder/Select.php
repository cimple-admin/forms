<?php

namespace CimpleAdmin\Forms\Builder;

use Illuminate\Validation\Rule;

class Select extends Component
{
    const COMPONENT_NAME = 'select';
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

    public function itemInArray($options): static
    {
        $this->rules['value'][] = Rule::in($options);

        return $this;
    }

    public function itemInOption(): static
    {
        $this->rules['value'][] = Rule::in(array_keys($this->options));

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
