<?php

namespace CimpleAdmin\Forms\Builder;

class TextInput extends Component
{
    const COMPONENT_NAME = 'input';
    private string $type = 'text';
    private string $label = '';
    private array $rules = [];
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

    public function required(): static
    {
        $this->rules[] = 'required';
        return $this;
    }

    public function email($validator = 'rfc'): static {
        $this->rules[] = 'email:' . $validator;
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