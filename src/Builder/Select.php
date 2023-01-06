<?php

namespace CimpleAdmin\Forms\Builder;

use CimpleAdmin\Forms\Builder\Traits\HasOptions;
use CimpleAdmin\Forms\Builder\Traits\HasRuleSingleValueItemInArray;
use CimpleAdmin\Forms\Builder\Traits\HasRuleSingleValueItemInOptions;
use Illuminate\Validation\Rule;

class Select extends Component
{
    use HasOptions;
    use HasRuleSingleValueItemInArray;
    use HasRuleSingleValueItemInOptions;

    const COMPONENT_NAME = 'select';

    public function __construct($property)
    {
        parent::__construct($property);
    }

    public function build(): array
    {
        $params = parent::build();
        $params['options'] = $this->options;

        return $params;
    }
}
