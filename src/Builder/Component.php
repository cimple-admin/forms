<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

abstract class Component
{
    use Validation;

    const COMPONENT_NAME = '';

    protected string $property;
    protected string $label = '';
    protected string $hint = '';

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function getProperty()
    {
        return $this->property;
    }

    public function getLable()
    {
        return $this->label;
    }

    public function label($label): static
    {
        $this->label = $label;

        return $this;
    }

    public function hint($hint) {
        $this->hint= $hint;

        return $this;
    }


    abstract public function build();
}
