<?php

namespace CimpleAdmin\Forms\Components;

class PasswordInput extends BaseComponent
{
    public string $type = 'password'; // Input 类型
    public string $hint = '';

    public function mount($rules = [])
    {
        $this->customRules = serialize($rules);
    }

    public function render()
    {
        return view('form::input');
    }
}
