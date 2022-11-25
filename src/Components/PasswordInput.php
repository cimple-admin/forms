<?php

namespace CimpleAdmin\Forms\Components;

class PasswordInput extends BaseComponent
{
    public string $type = 'password'; // Input 类型
    public string $hint = '';

    public function mount($label = '', $rules = [], $property = '', $hint = '')
    {
        $this->label = $label;
        $this->customRules = serialize($rules);
        $this->property = $property;
        $this->hint = $hint;
    }

    public function render()
    {
        return view('form::input');
    }
}
