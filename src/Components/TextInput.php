<?php

namespace CimpleAdmin\Forms\Components;

class TextInput extends BaseComponent
{
    public string $type = 'text'; // Input 类型
    public string $hint = '';
    protected string $viewName = 'form::input';
}
