<?php

namespace CimpleAdmin\Forms\Components;

use CimpleAdmin\Forms\Builder\Component;
use Illuminate\Contracts\Support\Htmlable;

class Container implements Htmlable
{
    private array $forms;

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public static function make($formBuilders): Container
    {
        $forms = [];
        /**
         * @var $formBuilders Component[]
         */
        foreach ($formBuilders as $builder) {
            $forms[$builder::COMPONENT_NAME] = $builder->build();
        }

        return new self($forms);
    }

    public function toHtml()
    {
        // TODO: Implement toHtml() method.
        return $this->render();
    }

    public function render()
    {
        return view('form::container', [
            'forms' => $this->forms,
        ]);
    }
}
