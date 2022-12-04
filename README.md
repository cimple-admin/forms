## livewire 表单构造器

这是一个基于 [livewire](https://laravel-livewire.com/) 的 [laravel](https://laravel.com/) 表单构造器。

前端基于 [Tailwind](https://tailwindcss.com/) 和 [daisyui](https://daisyui.com/)

### 如何使用
> 项目目前还处于开发期，变动会很大，不建议在生产环境中使用。
> 
> 使用本扩展需要对 [livewire](https://laravel-livewire.com/) 有足够的了解。

#### 在新项目中安装
1. 创建 laravel 项目后，安装扩展 `composer require cimple-admin/forms`
2. 安装后就可以使用 `artisan make:livewire XXX` 命令来创建自己的组件了。
3. 引入 `HasFormTrait`。只需实现一个方法 `getForm`
```php
   class Test1 extends Component
   {
       use HasFormTrait;
   
       public function render()
       {
           return view('livewire.test1');
       }
   
       public function getForm()
       {
           return [
               Input::make('password')->label("Password")->required()->passwordMin(10),
           ];
       }
   }
```
   
4. 这个方法返回了，一批表单组件。
```php
public function getForm()
{
    return [
        Input::make('password')->label('Password')->required()->passwordMin(10),
    ];
}
```
5. 页面模板 增加 `{{ $this->form }}` 就可以了
6. 前端样式参考 [https://tailwindcss.com/docs/guides/laravel](https://tailwindcss.com/docs/guides/laravel) 这里来搞定， `daisy` 也是参照他的文档加上依赖就可以了 (可以考虑增加个 command 来吧这步搞定)
   。最后在 `tailwind.config.js` 的 `content` 中添加 `"./vendor/cimple-admin/forms/resources/**/*.blade.php"`。 让构造器的页面可以被正确探测到，从而加载样式。

### 初步完成组件
* [x] input
* [x] password
* [x] checkbox
* [x] checklist

### 待增加组件
* [ ] radio
* [ ] select
* [ ] textarea
* [ ] editor (wangeditor and editor.md)
* [ ] fileupload (single or multi)
### 更多说明
1. 还在初期，改动很大，不要生产环境
2. 参考了很多 [https://filamentphp.com/](https://filamentphp.com/) 的逻辑，代码是否有交叉未知。