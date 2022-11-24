<?php

namespace CimpleAdmin\Forms\Components;

use Livewire\Component;

class PasswordInput extends Component
{
    public string   $value = ''; // Input 的输入值
    public string   $type = 'text'; // Input 类型
    public string   $label = ''; // Input 表单名称
    public string   $property = '';
    public string   $customRules = '';
    protected array $validationAttributes = [];

    public function mount($type, $label = '', $rules = [], $property = '')
    {
        $this->type = $type;
        $this->label = $label;
        $this->customRules = serialize($rules);
        $this->property = $property;
        $this->validationAttributes['value'] = $this->label;
    }

    public function updated($propertyName)
    {
        if ($this->property) {
            $this->emitUp('updateEvent', $this->property, $this->value);
        }
        $this->validateOnly($propertyName);
    }

    protected function validationAttributes(): array
    {
        return ['value' => $this->label];
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
        return new static();
    }

    public function render()
    {
        return view('form::input');
    }
}
