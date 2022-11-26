<?php

namespace CimpleAdmin\Forms\Components;

class Checkbox extends BaseComponent
{
    public $options = [];

    public function mount($label = '', $rules = [], $property = '', $options = [])
    {
        $this->label = $label;
        $this->customRules = serialize($rules);
        $this->property = $property;
        $this->options = $options;
    }

    public function render()
    {
        return view('form::checkbox');
    }
}
