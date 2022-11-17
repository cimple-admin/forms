<?php

namespace CimpleAdmin\Forms\Builder;

use Illuminate\Validation\Rules\Password;

class Input2
{
    const COMPONENT_NAME = 'input2';
    private $type;
    private $label;
    private $name;
    private $rules = [];

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
        $this->name = $label;
        return $this;
    }

    public function name($name): static
    {
        $this->name = $name;
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

    public function build() {
        return [
            'type' => $this->type,
            'name' => $this->name,
            'label' => $this->label,
            'rules' => $this->rules,
        ];
    }
}