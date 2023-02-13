<?php

namespace CimpleAdmin\Forms\Components;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class BaseComponent extends Component
{
    public string $customRules; // 自定义验证
    public string $property; // 绑定的外部变量名称，相互传递信息用
    public string $label; // 表单字段名称
    public string|array|bool $value; // 表单字段初始值
    public string $hint; // 表单输入框的提示信息（这个是否后期还保留待定）
    public string $placeHolder; // 表单的 placeHolder
    public bool $hiddenLabel = false; // 是否隐藏表单的名称显示
    public bool $inline = false; // 表单是否已横向方式显示

    public int $inlineLabelWidth = 2; // 单行表单 label 宽度
    public bool $notifyParentUpdate = true; // 通知父组件更新值
    protected string $viewName = ''; // 组件绑定的视图名称

    /**
     * livewire 声明周期函数
     * 序列化验证逻辑，如果不序列化 livewire 没法正确处理，不过这么处理感觉不是很好
     * 等有更好的方案后再继续.
     *
     * @param  array  $rules
     * @return void
     */
    public function mount(array $rules = []): void
    {
        $this->customRules = serialize($rules);
    }

    /**
     * livewire 生命周期函数，触发属性更新的时候要向外部传递事件
     * 以及进行相关验证
     *
     * @param $propertyName
     * @return void
     */
    public function updatedValue()
    {
        if ($this->notifyParentUpdate) {
            if ($this->property) {
                $this->emitUp('updateEvent', $this->property, $this->value);
            }
        }

        $this->validateOnly('value');
        $this->validateOnly('value.*');
    }

    /**
     * livewire 获取验证时候属性名称方法.
     *
     * @return string[]
     */
    protected function validationAttributes(): array
    {
        return ['value' => $this->label];
    }

    /**
     * livewire 获取验证条件方法，这里的作用就是把 mount 序列化的条件反序列化.
     *
     * @return array[]
     */
    public function rules(): array
    {
        $rules = ['value' => []];
        if ($this->customRules && unserialize($this->customRules)) {
            $rules = unserialize($this->customRules);
        }

        return $rules;
    }

    /**
     * livewire 渲染组件方法.
     *
     * @return Factory|View|Application
     */
    public function render(): Factory|View|Application
    {
        return view($this->viewName);
    }
}
