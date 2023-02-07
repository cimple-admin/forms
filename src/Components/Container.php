<?php

namespace CimpleAdmin\Forms\Components;

use CimpleAdmin\Forms\Builder\Component;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class Container implements Htmlable
{
    private array $forms;

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public static function make($component): self
    {
        $formBuilders = $component->getForm();
        $forms = [];
        /**
         * @var $formBuilders Component[]
         */
        foreach ($formBuilders as $builder) {
            $componentParams = $builder->build();
            $property = $componentParams['property'];
            if (isset($component->$property)) {
                $componentParams['value'] = $component->$property;
            }
            $forms[$builder::COMPONENT_NAME.':'.$builder->getProperty()] = $componentParams;
        }

        return new self($forms);
    }

    public function toHtml(): Factory|View|string|Application
    {
        // TODO: Implement toHtml() method.
        return $this->render();
    }

    public function render(): Factory|View|Application
    {
        return view('form::container', [
            'forms' => $this->forms,
        ]);
    }
}
