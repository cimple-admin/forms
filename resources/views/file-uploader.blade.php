<div class="form-control">
    fdsafdas
    <div class="dropzone" id="my-form"></div>
    <script>
        document.addEventListener('livewire:load', function () {
            const myDropzone = new Dropzone("#my-form", {
                url: "/cimple-admin/form/file/upload",
                paramName: 'file[]',
                // uploadMultiple: true,
                chunking: true,
                maxFilesize: 1000000000000000,
                // parallelChunkUploads: true,
                // maxFiles: 1,
                chunkSize: 4*1024*1024,
                forceChunking: true,
                addRemoveLinks: true,
            });

            myDropzone.on('maxfilesexceeded', (file) => {
                console.log('abc',file)
                myDropzone.removeFile(file)
            })

            myDropzone.on("addedfile", (file) => {
                // Add an info line about the added file for each file.
                console.log(file)
            });
        })
    </script>
    fdasfdasfdas
</div>
