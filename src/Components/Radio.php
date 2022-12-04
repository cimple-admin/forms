<?php

namespace CimpleAdmin\Forms\Components;

class Radio extends BaseComponent
{
    public array $options = [];
    public string $type = 'checkbox';

    public function mount($value = [], $rules = [])
    {
        $this->customRules = serialize($rules);
        $this->value = $value;
    }

    protected function validationAttributes(): array
    {
        $attributes = parent::validationAttributes();
        $attributes['value.*'] = $this->label;

        return $attributes;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::radio');
    }
}
