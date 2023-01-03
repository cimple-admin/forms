<?php

namespace CimpleAdmin\Forms\Builder;

class PasswordInput extends TextInput
{
    const COMPONENT_NAME = 'input-password';

    public string $type = 'password';

    // TODO 准备给 password 增加一个查看密码的选项
}
