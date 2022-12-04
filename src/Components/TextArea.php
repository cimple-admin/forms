<?php

namespace CimpleAdmin\Forms\Components;

class TextArea extends BaseComponent
{
    public string $hint = '';

    public function mount($value = '', $rules = [])
    {
        $this->customRules = serialize($rules);
        $this->value = $value;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::textarea');
    }
}
