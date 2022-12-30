<?php

namespace CimpleAdmin\Forms\Builder;

class TextInput extends Component
{
    const COMPONENT_NAME = 'input-text';
    // TODO 这里需要增加一个改变type 的方法，
    // TODO 除了 password 剩下的都可以在这边通过type 方法改变，
    // TODO 当然 password 最后也可以考虑到这边一起处理

    public string $type = 'text';

    public function type($type): static
    {
        $this->type = $type;

        return $this;
    }

    public function build(): array
    {
        $params =  parent::build(); // TODO: Change the autogenerated stub
        $params['type'] = $this->type;
        return $params;
    }
}
