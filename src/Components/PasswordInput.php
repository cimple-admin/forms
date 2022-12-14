<?php

namespace CimpleAdmin\Forms\Components;

class PasswordInput extends BaseComponent
{
    public string $type = 'password'; // Input 类型
    public string $hint = '';
    protected string $viewName = 'form::input';
}
