<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Traits\Validation;

abstract class Component
{
    use Validation;
    const COMPONENT_NAME = '';

    protected string $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    public function getProperty()
    {
        return $this->property;
    }


    abstract public function build();
}
