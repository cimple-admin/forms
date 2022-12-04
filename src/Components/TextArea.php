<?php

namespace CimpleAdmin\Forms\Components;

class TextArea extends BaseComponent
{
    public string $hint = '';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::textarea');
    }
}
