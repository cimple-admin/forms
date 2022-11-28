<?php

namespace CimpleAdmin\Forms\Components;

class Checkbox extends BaseComponent
{
    public $options = [];
    public $type = 'checkbox';

    public function mount($label = '', $rules = [], $property = '', $options = [])
    {
        $this->label = $label;
        $this->customRules = serialize($rules);
        $this->property = $property;
        $this->options = $options;
    }

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }

    public function render()
    {
        return view('form::checkbox');
    }
}
