<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Support\Htmlable;

class Container implements Htmlable
{
    private $forms;

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public static function make($forms): Container
    {
        return new Self($forms);
    }

    public function toHtml()
    {
        // TODO: Implement toHtml() method.
        return $this->render();
    }

    public function render() {
        return view('form::container', [
            'forms' => $this->forms,
        ]);
    }
}