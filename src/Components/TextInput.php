<?php

namespace CimpleAdmin\Forms\Components;

class TextInput extends BaseComponent
{
    public string $type = 'text'; // Input 类型
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
