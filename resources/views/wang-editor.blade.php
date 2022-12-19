<div class="form-control">
    <label class="label">
        <span class="label-text">{{$label}}</span>
    </label>
    <div id="editor—wrapper-{{$property}}" wire:ignore>
        <div wire:ignore.self id="toolbar-container-{{$property}}"><!-- 工具栏 --></div>
        <div wire:ignore.self id="editor-container-{{$property}}"><!-- 编辑器 --></div>
    </div>
    <label class="label">
        <span class="label-text-alt">
            @error('value')
                <span class="error text-error">{{ $message }}</span>
            @enderror
         </span>
    </label>
    @once
        @push('style')
            <link rel="stylesheet" href="{{asset('/vendor/forms/wangeditor/css/style.css')}}">
            <style>
                #editor—wrapper-{{$property}} {
                    border: 1px solid #ccc;
                    z-index: 100; /* 按需定义 */
                }

                #toolbar-container-{{$property}} {
                    border-bottom: 1px solid #ccc;
                }

                #editor-container-{{$property}} {
                    height: 500px;
                }

                .w-e-text-container h1 {
                    font-size: 1.5rem; /* 24px */
                    line-height: 2rem; /* 32px */
                    font-weight: 700;
                }

                .w-e-text-container h2 {
                    font-size: 1.25rem; /* 20px */
                    line-height: 1.75rem; /* 28px */
                    font-weight: 700;
                }

                .w-e-text-container h3 {
                    font-size: 1.125rem; /* 18px */
                    line-height: 1.75rem; /* 28px */
                    font-weight: 700;
                }

                .w-e-text-container h4 {
                    font-size: 1rem; /* 16px */
                    line-height: 1.5rem; /* 24px */
                    font-weight: 700;
                }

                .w-e-text-container h5 {
                    font-size: 0.875rem; /* 14px */
                    line-height: 1.25rem; /* 20px */
                    font-weight: 700;
                }
            </style>
        @endpush
        @push('scripts')
            <script src="{{asset('/vendor/forms/wangeditor/index.js')}}"></script>
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
    @endonce
</div>
