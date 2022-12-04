<?php

namespace CimpleAdmin\Forms\Components;

class Radio extends BaseComponent
{
    public $options = [];
    public $type = 'checkbox';

    public function mount($rules = [])
    {
        $this->customRules = serialize($rules);
    }

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }

    public function render()
    {
        return view('form::radio');
    }
}
