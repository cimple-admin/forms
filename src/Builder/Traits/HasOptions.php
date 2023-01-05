<?php

namespace CimpleAdmin\Forms\Builder\Traits;

trait HasOptions
{
    private array $options = [];

    public function options($options): static
    {
        $this->options = $options;

        return $this;
    }

}