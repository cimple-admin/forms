<?php

namespace CimpleAdmin\Forms\Builder;

class CheckBox extends Component
{
    const COMPONENT_NAME = 'checkbox';
    private array $options = [];
    private string $type = 'checkbox';

    public function __construct($property)
    {
        parent::__construct($property);
        $this->required()->accept();
    }

    public function label($label): static
    {
        parent::label($label);
        $this->options = [true => $label];

        return $this;
    }

    public function toggle(): static
    {
        $this->type = 'toggle';

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
            'type' => $this->type,
        ];
    }
}
