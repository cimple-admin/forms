<?php

namespace CimpleAdmin\Forms\Components;

class TextInput extends BaseComponent
{
    public string $type = 'text'; // Input 类型
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
