<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        <div id="testUpload" class="dropzone"></div>
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
    @once
        @push('style')
            <link rel="stylesheet" href="{{asset('/vendor/forms/admin-lte/plugins/dropzone/min/dropzone.min.css')}}">
            <style>
                .dropzone {
                    border: 1px solid rgba(0, 0, 0, .3);
                    border-radius: 4px;
                }
            </style>
        @endpush
        @push('scripts')
            <script src="{{asset('/vendor/forms/admin-lte/plugins/dropzone/min/dropzone.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script !src="">
            document.addEventListener('livewire:load', function () {
                Dropzone.autoDiscover = false

                // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
                // var previewNode = document.querySelector("#template")
                // previewNode.id = ""
                // var previewTemplate = previewNode.parentNode.innerHTML
                // previewNode.parentNode.removeChild(previewNode)

                var myDropzone = new Dropzone('#testUpload', { // Make the whole body a dropzone
                    url: @this.uploadUrl, // Set the url
                    dictDefaultMessage: @this.buttonText,
                    thumbnailWidth: 80,
                    thumbnailHeight: 80,
                    parallelUploads: 20,
                    chunking: true,
                    forceChunking: true,
                    chunkSize: @this.chunkSize,
                    maxFilesize: @this.maxFileSize,
                    // previewTemplate: previewTemplate,
                    autoQueue: false, // Make sure the files aren't queued until manually added
                    // previewsContainer: "#previews", // Define the container to display the previews
                    // clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                })

                myDropzone.on("addedfile", function (file) {
                    // Hookup the start button
                    file.previewElement.querySelector(".start").onclick = function () {
                        myDropzone.enqueueFile(file)
                    }
                })

                // Update the total progress bar
                myDropzone.on("totaluploadprogress", function(progress) {
                    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
                })

                myDropzone.on("sending", function(file) {
                    // Show the total progress bar when upload starts
                    document.querySelector("#total-progress").style.opacity = "1"
                    // And disable the start button
                    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
                })

                // Hide the total progress bar when nothing's uploading anymore
                myDropzone.on("queuecomplete", function (progress) {
                    document.querySelector("#total-progress").style.opacity = "0"
                })

                // Setup the buttons for all transfers
                // The "add files" button doesn't need to be setup because the config
                // `clickable` has already been specified.
                // document.querySelector("#actions .start").onclick = function() {
                //     myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
                // }
                // document.querySelector("#actions .cancel").onclick = function() {
                //     myDropzone.removeAllFiles(true)
                // }
                // DropzoneJS Demo Code End
            })
        </script>
    @endpush
</div>
