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
    private static array $fillValues = [];

    public function __construct($forms)
    {
        $this->forms = $forms;
    }

    public static function make($formBuilders): self
    {
        $forms = [];
        /**
         * @var $formBuilders Component[]
         */
        foreach ($formBuilders as $builder) {
            $componentParams = $builder->build();
            if ($componentParams['value']) {
                self::$fillValues[$componentParams['property']] = $componentParams['value'];
            }
            $forms[$builder::COMPONENT_NAME.':'.$builder->getLabel()] = $componentParams;
        }

        return new self($forms);
    }

    public function fill($component): static
    {
        foreach (self::$fillValues as $propertyName => $value) {
            $component->$propertyName = $value;
        }

        return $this;
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
