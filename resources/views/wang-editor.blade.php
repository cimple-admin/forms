<div class="form-control">
    <label class="label">
        <span class="label-text">{{$label}}</span>
    </label>
    <div id="editor—wrapper" wire:ignore>
        <div wire:ignore.self id="toolbar-container"><!-- 工具栏 --></div>
        <div wire:ignore.self id="editor-container"><!-- 编辑器 --></div>
    </div>
    <label class="label">
        <span class="label-text-alt">
            @error('value')
                <span class="error text-error">{{ $message }}</span>
            @enderror
         </span>
    </label>
    <script>
        document.addEventListener('livewire:load', function () {
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
                selector: '#editor-container',
                html: '<h1>fdas</h1>',
                config: editorConfig,
                mode: 'default', // or 'simple'
            })

            const toolbarConfig = {}

            const toolbar = createToolbar({
                editor,
                selector: '#toolbar-container',
                config: toolbarConfig,
                mode: 'default', // or 'simple'
            })
        })
    </script>
</div>
