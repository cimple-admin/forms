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
    protected string|array|bool $value = '';

    public function __construct($property)
    {
        $this->property = $property;
        $this->label = $property;
    }

    public static function make($property): static
    {
        return new static($property);
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function getLable(): string
    {
        return $this->label;
    }

    public function label($label): static
    {
        $this->label = $label;

        return $this;
    }

    public function hint($hint): static
    {
        $this->hint = $hint;

        return $this;
    }

    public function value($value): static
    {
        $this->value = $value;

        return $this;
    }

    abstract public function build();
}
