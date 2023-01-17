<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        <div id="testUpload" class="dropzone">
            <div class="dz-default dz-message">
                <ion-icon class="upload-icon" name="cloud-upload-outline"></ion-icon>
                <button class="btn btn-primary btn-sm" type="button">{{$buttonText}}</button>
            </div>
        </div>
        @include('form::file-uploader-preview')
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
    @once
        @push('style')
            <link rel="stylesheet" href="{{asset('/vendor/forms/admin-lte/plugins/dropzone/min/dropzone.min.css')}}">
            <style>
                .dropzone {
                    border: 1px dashed #ced4da;
                    border-radius: 4px;
                    min-height: 206px;
                }

                ion-icon.upload-icon {
                    font-size: 58px;
                    padding-bottom: 16px;
                    display: block;
                    margin: 0 auto;
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

                var previewNode = document.querySelector('#template')
                previewNode.id = ''
                var previewTemplate = previewNode.parentNode.innerHTML
                previewNode.parentNode.removeChild(previewNode)

                var myDropzone = new Dropzone('#testUpload', { // Make the whole body a dropzone
                    url: @this.uploadUrl, // Set the url
                    thumbnailWidth: 60,
                    thumbnailHeight: 60,
                    parallelUploads: 20,
                    chunking: true,
                    forceChunking: true,
                    previewTemplate: previewTemplate,
                    chunkSize: @this.chunkSize,
                    maxFilesize: @this.maxFileSize,
                    maxFiles: @this.maxFiles,
                    dictFallbackMessage: @this.dictFallbackMessage,
                    dictFileTooBig: @this.dictFileTooBig,
                    dictInvalidFileType: @this.dictInvalidFileType,
                    dictResponseError: @this.dictResponseError,
                    dictMaxFilesExceeded: @this.dictMaxFilesExceeded,
                    // previewTemplate: previewTemplate,
                    // autoQueue: false, // Make sure the files aren't queued until manually added
                    // previewsContainer: "#previews", // Define the container to display the previews
                    // clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                })

                myDropzone.on("error", function (file, message) {
                    toastr.error(message);
                    this.removeFile(file);
                });

                myDropzone.on("success", function (file) {
                    file.url = file.xhr.responseText
                });

                myDropzone.on("removedfile", function (file) {
                    console.log(file)
                    console.log(@this.removeFileOnServer
                )
                    if (@this.
                    removeFileOnServer == 1
                )
                    {
                        $.post(@this.deleteUrl, {url: file.url}
                    )
                    }
                })

                // myDropzone.on("addedfile", function (file) {
                //     // Hookup the start button
                //     file.previewElement.querySelector(".start").onclick = function () {
                //         myDropzone.enqueueFile(file)
                //     }
                // })
                //
                // // Update the total progress bar
                // myDropzone.on("totaluploadprogress", function(progress) {
                //     document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
                // })
                //
                // myDropzone.on("sending", function(file) {
                //     // Show the total progress bar when upload starts
                //     document.querySelector("#total-progress").style.opacity = "1"
                //     // And disable the start button
                //     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
                // })
                //
                // // Hide the total progress bar when nothing's uploading anymore
                // myDropzone.on("queuecomplete", function (progress) {
                //     document.querySelector("#total-progress").style.opacity = "0"
                // })

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
