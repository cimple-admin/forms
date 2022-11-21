<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Input extends Component
{
    public $value; // Input 的输入值
    public $type; // Input 类型
    public $label; // Input 表单名称
    public $property;
    public $customRules;
    public function mount($type, $label = '', $rules = [], $property = '')
    {
        $this->type = $type;
        $this->label = $label;
        $this->customRules = serialize($rules);
        $this->property = $property;
    }


    public function updated($propertyName)
    {
        if ($this->property) {
            $this->emitUp('updateEvent', $this->property, $this->value);
        }
        $this->validateOnly($propertyName);
    }

    public function rules()
    {
        return [
            'value' => unserialize($this->customRules),
        ];
    }

    public static function make(): static
    {
        return new Static;
    }

    public function render()
    {
        return view('form::input');
    }
}