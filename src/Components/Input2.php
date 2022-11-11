<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;

class Input2 implements Htmlable
{


    public static function make(): static
    {
        return new Static;
    }

    public function toHtml()
    {
//        dd('abcdef');
        // TODO: Implement toHtml() method.
        return $this->render();
    }

    public function render() {
        return view('form::input', [
            'params' => 'abc123',
        ]);
    }
}