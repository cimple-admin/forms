<?php

namespace CimpleAdmin\Forms\Components;

class PasswordInput extends BaseComponent
{
    public string $type = 'password'; // Input 类型
    public string $hint = '';

    public function mount($value = '', $rules = [])
    {
        $this->customRules = serialize($rules);
        $this->value = $value;
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::input');
    }
}
