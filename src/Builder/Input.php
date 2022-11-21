<?php

namespace CimpleAdmin\Forms\Builder;

use Illuminate\Validation\Rules\Password;

class Input
{
    const COMPONENT_NAME = 'input';
    private $type = '';
    private $label = '';
    private $rules = [];
    private $property = '';

    // 初始的构造函数
    public static function make($type = 'text'): static
    {
        $instance = new Static();
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

    public function bindProperty($propertyName)
    {
        $this->property = $propertyName;
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