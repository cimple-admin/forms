## livewire 表单构造器

这是一个基于 [livewire](https://laravel-livewire.com/) 的 [laravel](https://laravel.com/) 表单构造器。

前端基于 [Tailwind](https://tailwindcss.com/) 和 [daisyui](https://daisyui.com/)

### 如何使用
> 项目目前还处于开发期，变动会很大，不建议在生产环境中使用。
> 
> 使用本扩展需要对 [livewire](https://laravel-livewire.com/) 有足够的了解。

#### 在新项目中安装
1. 创建 laravel 项目后，安装扩展 `composer require cimple-admin/forms`
2. `./vendor/bin/sail artisan vendor:publish --tag=cimple-form` 使用这个命令把资源文件复制到自己的项目中
3. 安装后就可以使用 `artisan make:livewire XXX` 命令来创建自己的组件了。
4. 引入 `HasFormTrait`。只需实现一个方法 `getForm`
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
   
5. 这个方法返回了，一批表单组件。
   ```php
   public function getForm()
   {
       return [
           Input::make('password')->label('Password')->required()->passwordMin(10),
       ];
   }
   ```
6. 页面模板 增加 `{{ $this->form }}` 就可以了
7. ~~前端样式参考 [https://tailwindcss.com/docs/guides/laravel](https://tailwindcss.com/docs/guides/laravel) 这里来搞定， `daisy` 也是参照他的文档加上依赖就可以了 (可以考虑增加个 command 来吧这步搞定)
   。最后在 `tailwind.config.js` 的 `content` 中添加 `"./vendor/cimple-admin/forms/resources/**/*.blade.php"`。 让构造器的页面可以被正确探测到，从而加载样式。~~

### 初步完成组件
* [x] input
* [x] password
* [x] checkbox
* [x] checklist
* [x] radio
* [x] textarea
* [x] select
* [x] wangeditor
* [x] fileupload (准备从 dropzone 切换到 plupload ，可能plupload 的事件处理更符合我的想法)

上面这些仅仅是功能完成了，后续还有抽象、样式优化、功能细节优化等持续功能要做

### 待增加组件
* [ ] editor ( editor.md 、 ueditorplus(这个待考虑))
### 更多说明
1. 还在初期，改动很大，不要生产环境
2. 参考了很多 [https://filamentphp.com/](https://filamentphp.com/) 的逻辑，代码是否有交叉未知。