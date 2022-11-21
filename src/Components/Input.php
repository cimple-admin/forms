<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class Input extends Component
{
    public string $value = ''; // Input 的输入值
    public string $type; // Input 类型
    public string $label; // Input 表单名称
    public string $property = '';
    public string $customRules = '';
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

    public function rules(): array
    {
        $rules = [];
        if ($this->customRules) {
            $rules = [
                'value' => unserialize($this->customRules),
            ];
        }
        return $rules;
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