<?php

namespace CimpleAdmin\Forms\Components;

use CimpleAdmin\Forms\Builder\Component;
use Illuminate\Contracts\Support\Htmlable;

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

    public function toHtml(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string|\Illuminate\Contracts\Foundation\Application
    {
        // TODO: Implement toHtml() method.
        return $this->render();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('form::container', [
            'forms' => $this->forms,
        ]);
    }
}
