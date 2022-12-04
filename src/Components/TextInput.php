<?php

namespace CimpleAdmin\Forms\Components;

class TextInput extends BaseComponent
{
    public string $type = 'text'; // Input 类型
    public string $hint = '';



    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::input');
    }
}
