<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        <div id="editor—wrapper-{{$property}}" class="editor—wrapper" wire:ignore>
            <div wire:ignore.self class="toolbar-container" id="toolbar-container-{{$property}}"><!-- 工具栏 --></div>
            <div wire:ignore.self class="editor-container" id="editor-container-{{$property}}"><!-- 编辑器 --></div>
        </div>
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
    @once
        @push('style')
            <link rel="stylesheet" href="{{asset('/vendor/forms/wangeditor/css/style.css')}}">
            <style>
                .editor—wrapper {
                    border: 1px solid #ccc;
                    z-index: 100; /* 按需定义 */
                }

                .toolbar-container {
                    border-bottom: 1px solid #ccc;
                }

                .editor-container {
                    height: 500px;
                }
            </style>
        @endpush
        @push('scripts')
            <script src="{{asset('/vendor/forms/wangeditor/index.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                const {createEditor, createToolbar} = window.wangEditor
                const editorConfig = {
                    placeholder: 'Type here...',
                    MENU_CONF: {},
                    onChange(editor) {
                        const html = editor.getHtml();
                        console.log('editor content', html);
                        @this.value = html
                        // 也可以同步到 <textarea>
                    }
                }

                const editor = createEditor({
                    selector: '#editor-container-{{$property}}',
                    html: @this.value,
                    config: editorConfig,
                    mode: 'default', // or 'simple'
                })

                const toolbarConfig = {}

                const toolbar = createToolbar({
                    editor,
                    selector: '#toolbar-container-{{$property}}',
                    config: toolbarConfig,
                    mode: 'default', // or 'simple'
                })
            })
        </script>
    @endpush
</div>
