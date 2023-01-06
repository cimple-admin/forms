<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Builder\Traits\HasOptions;
use CimpleAdmin\Forms\Builder\Traits\HasRuleArrayValueItemInArray;
use CimpleAdmin\Forms\Builder\Traits\HasRuleArrayValueItemInOptions;

class CheckList extends Component
{
    use HasOptions;
    use HasRuleArrayValueItemInArray;
    use HasRuleArrayValueItemInOptions;

    const COMPONENT_NAME = 'checkbox';

    public function __construct($property)
    {
        parent::__construct($property);
        $this->rules['value'][] = 'array';
        $this->value = [];
    }

    public function build(): array
    {
        $params = parent::build();
        $params['options'] = $this->options;

        return $params;
    }
}
