<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

abstract class Component
{
    use Validation;

    const COMPONENT_NAME = '';

    protected string $property;
    protected string $label = '';

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

    abstract public function build();
}
