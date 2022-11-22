<?php

namespace CimpleAdmin\Forms\Builder;

use Illuminate\Validation\Rules\Password;

class Input
{
    const COMPONENT_NAME = 'input';
    private string $type = '';
    private string $label = '';
    private array $rules = [];
    private string $property = '';

    // 初始的构造函数
    public static function make($type = 'text'): static
    {
        $instance = new static();
        $instance->type = $type;

        return $instance;
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

    public function passwordMin($length): static
    {
        $this->rules[] = Password::min($length);

        return $this;
    }

    public function bindProperty($propertyName): static
    {
        $this->property = $propertyName;

        return $this;
    }

    public function build(): array
    {
        return [
            'type'     => $this->type,
            'rules'    => $this->rules,
            'property' => $this->property,
            'label'    => $this->label,
        ];
    }
}
