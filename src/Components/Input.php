<?php

namespace CimpleAdmin\Forms\Components;

// 输入表单组件
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Input extends Component
{
   public $type;
   public $label;
   public $name;

   public $rules;

   public $value;

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

    public function rules(): array
    {
        return $this->rules;
    }

    public function passwordMin($length): static
    {
        $this->rules[] = Password::min($length);
        return $this;
    }

    public function render()
    {
        return view('form::input');
    }
}