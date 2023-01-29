## livewire 表单构造器

这是一个基于 [livewire](https://laravel-livewire.com/) 的 [laravel](https://laravel.com/) 表单构造器。

前端基于 [AdminLTE](https://adminlte.io/)

[![Security Status](https://www.murphysec.com/platform3/v3/badge/1611441299463372800.svg?t=1)](https://www.murphysec.com/accept?code=5607fe9d76703e206fe71e9aa0f45ca1&type=1&from=2&t=2)

### 如何使用

> 项目目前还处于开发期，变动会很大，不建议在生产环境中使用。
>
> 使用本扩展需要对 [livewire](https://laravel-livewire.com/) 有足够的了解。

#### 在新项目中安装

1. 创建 laravel 项目后，安装扩展 `composer require cimple-admin/forms`
2. ` ./vendor/bin/sail artisan vendor:publish --tag=cimple-form --force`
   使用这个命令把资源文件复制到自己的项目中，注意这个命令适合全新项目使用，如果是混合项目，则可以去 `provider`
   里面看下需要什么再复制对应资源，尤其是 layout 不要覆盖了。
3. 安装后就可以使用 `artisan make:livewire XXX` 命令来创建自己的组件了。
4. 引入 `HasFormTrait`。只需实现一个方法 `getForm`
   ```php
   namespace App\Http\Livewire;

   use Illuminate\Validation\Rules\Password;
   use JetBrains\PhpStorm\NoReturn;
   use Livewire\Component;
   use CimpleAdmin\Forms\Builder\TextInput;
   use CimpleAdmin\Forms\Builder\PasswordInput;
   use CimpleAdmin\Forms\Builder\CheckList;
   use CimpleAdmin\Forms\Builder\CheckBox;
   use CimpleAdmin\Forms\Builder\Select;
   use CimpleAdmin\Forms\Builder\SelectMulti;
   use CimpleAdmin\Forms\Builder\Radio;
   use CimpleAdmin\Forms\Builder\Textarea;
   use CimpleAdmin\Forms\Builder\WangEditor;
   use CimpleAdmin\Forms\Builder\FileUploader;
   use CimpleAdmin\Forms\HasForm;
   use CimpleAdmin\Forms\Traits\HasFormTrait;
   
   class Test1 extends Component
   {
   use HasFormTrait;
   
       public string $title = "test page title";
   
       public string $email = 'abc';
       public string $password;
       public string $username = 'df fdasfs';
       public array  $hobby;
       public bool   $remember = false;
       public string $tel;
       public string $sex;
       public string $intro;
   
       public string|array $interest;
       public string       $interest2;
       public string       $content1;
       public string       $content2;
       public array $pic = ['c9fe0330-3d8f-4ead-9b99-144e7e35a734.pdf', '671c09c8-e6d4-4440-a5ac-4c99744a5daf.jpg'];
       public array $pic2;
   
       public function render()
       {
           return view('livewire.test1');
       }
   
       public function getForm(): array
       {
           return [
               TextInput::make('email')->label("电子邮件")->required()->email()->hint("this is text input hint"),
               TextInput::make('username')->label("用户名")->required()->alphaDash(),
   //            TextInput::make('tel')->label("手机号")->required()->type('tel'),
   //            PasswordInput::make('password')->label("密码")->required()->rules([
   //                Password::min(10)->letters()->numbers()->mixedCase()->symbols(),
   //            ])->hint("密码必须包含大写字母、小写字母、符号以及数字，最少10位"),
   //            CheckList::make('hobby')->label('爱好')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInArray(['football']),
   //            CheckBox::make('remember')->label('记住我')->toggle()->hiddenLabel(),
   //            Radio::make('sex')->label('性别')->options([
   //                'male' => '男',
   //                'female' => '女',
   //                'other' => '未知',
   //            ])->required()->itemInOption(),
   //            SelectMulti::make('interest')->label('爱好2')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInOption()->inline(),
   //            Select::make('interest2')->label('爱好3')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInOption()->inline(),
   Textarea::make('intro')->label('简介')->rows(8)->inline(),
   //            WangEditor::make('content1')->label('内容1'),
   //            WangEditor::make('content2')->label('内容2')->inline(),
   FileUploader::make('pic')->label('封面图片')->maxFileSize(1000 * 1024 * 1024)->autoUpload(true),
   //FileUploader::make('pic2')->label('封面图片2')->maxFileSize(1000 * 1024 * 1024)->autoUpload(false),
   ];
   }
   
       #[NoReturn] public function submit()
       {
           $this->validate();
           dd('pass validate', $this->content1, $this->username, $this->email);
       }
   }

   ```
   
5. 这个方法返回了，一批表单组件。
   ```php
   public function getForm()
   {
       return [
               TextInput::make('email')->label("电子邮件")->required()->email()->hint("this is text input hint"),
               TextInput::make('username')->label("用户名")->required()->alphaDash(),
   //            TextInput::make('tel')->label("手机号")->required()->type('tel'),
   //            PasswordInput::make('password')->label("密码")->required()->rules([
   //                Password::min(10)->letters()->numbers()->mixedCase()->symbols(),
   //            ])->hint("密码必须包含大写字母、小写字母、符号以及数字，最少10位"),
   //            CheckList::make('hobby')->label('爱好')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInArray(['football']),
   //            CheckBox::make('remember')->label('记住我')->toggle()->hiddenLabel(),
   //            Radio::make('sex')->label('性别')->options([
   //                'male' => '男',
   //                'female' => '女',
   //                'other' => '未知',
   //            ])->required()->itemInOption(),
   //            SelectMulti::make('interest')->label('爱好2')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInOption()->inline(),
   //            Select::make('interest2')->label('爱好3')->options([
   //                'football' => '足球',
   //                'swaming' => '游泳',
   //                'basketball' => '篮球',
   //            ])->required()->itemInOption()->inline(),
   Textarea::make('intro')->label('简介')->rows(8)->inline(),
   //            WangEditor::make('content1')->label('内容1'),
   //            WangEditor::make('content2')->label('内容2')->inline(),
   FileUploader::make('pic')->label('封面图片')->maxFileSize(1000 * 1024 * 1024)->autoUpload(true),
   //FileUploader::make('pic2')->label('封面图片2')->maxFileSize(1000 * 1024 * 1024)->autoUpload(false),
   ];
   }
   ```
6. 页面模板
   ```html
    <div class="">
     {{-- If your happiness depends on money, you will never be happy with yourself. --}}
     {{$this->form}}
     <button class="btn" wire:click="submit"  @if($disableSubmitBtn)disabled @endif>submit</button>
   </div>
   @section('title')
       {{$title}}
   @endsection
   ```
   只要增加 `{{$this->form}}` 就可以显示出来再代码中定义的组件了
   至于 button 就是自己实现提交逻辑的方法了，这个库只生成表单，其他的都要自己实现，后续的更多支持，可以期待后续的库
7. 至此，全部都结束了。只需在代码里面定义表单和提交逻辑，前端部分几乎什么都不需要了。

### 初步完成组件
* [x] input
* [x] password
* [x] checkbox
* [x] checklist
* [x] radio
* [x] textarea
* [x] select
* [x] wangeditor
* [x] fileupload (dropzone)

上面这些仅仅是功能完成了，后续还有抽象、样式优化、功能细节优化等持续功能要做

### 待增加组件
* [ ] editor ( editor.md 、 ueditorplus(这个待考虑))
### 更多说明
1. 还在初期，改动很大，不要生产环境
2. 参考了很多 [https://filamentphp.com/](https://filamentphp.com/) 的逻辑，代码是否有交叉未知。