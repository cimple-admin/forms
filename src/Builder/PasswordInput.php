<?php

namespace CimpleAdmin\Forms\Builder;

class PasswordInput extends Component
{
    const COMPONENT_NAME = 'input-password';
    private string $type = 'password';

    public function __construct($property)
    {
        parent::__construct($property);
        $this->label = $property;
    }

    public static function make($property): self
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
