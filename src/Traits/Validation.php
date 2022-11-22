<?php

namespace CimpleAdmin\Forms\Traits;

trait Validation
{
    private array $rules = [];

    public function required(): static
    {
        $this->rules[] = 'required';

        return $this;
    }

    public function email($validator = 'rfc'): static
    {
        $this->rules[] = 'email:'.$validator;

        return $this;
    }
}
