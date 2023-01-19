<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div wire:ignore id="uploadArea{{$property}}" class="{{ $inline ? 'col-sm-10' : '' }}">
        <div id="uploadContainer{{$property}}" class="dropzone">
            <div class="dz-default dz-message">
                <ion-icon class="upload-icon" name="cloud-upload-outline"></ion-icon>
                <button class="btn btn-primary btn-sm" type="button">{{$buttonText}}</button>
            </div>
            {{--            这下面输出的是图片预览--}}
        </div>
        @if($autoUpload ==  false)
            <div class="float-right mt-1">
                <button id="uploadBtn" class="btn btn-primary" type="button">上传</button>
            </div>
        @endif
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
                    padding: 0;
                }

                ion-icon.upload-icon {
                    font-size: 58px;
                    padding-bottom: 16px;
                    display: block;
                    margin: 0 auto;
                }

                .dz-success .upload-finish {
                    display: none;
                }

                .dz-image-preview img {
                    width: 60px;
                    width: 60px;
                }

                .upload-preview {
                    padding: 10px;
                }

                .upload-preview p {
                    margin-bottom: 0;
                }

                #uploadBtn {
                    display: none;
                }

                #uploadBtn.show {
                    display: block;
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
                var previewNode = document.querySelector('#template')
                previewNode.id = ''
                var previewTemplate = previewNode.parentNode.innerHTML
                previewNode.parentNode.removeChild(previewNode)

                var myDropzone = new Dropzone('#uploadContainer{{$property}}', { // Make the whole body a dropzone
                    url: @this.uploadUrl, // Set the url
                    thumbnailWidth: 500,
                    thumbnailHeight: 500,
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
                    autoProcessQueue: @this.autoUpload,
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
                    // console.log(file.previewElement.childNodes);
                    if (file.previewElement) {
                        file.previewElement.childNodes[5].classList.add("upload-finish");
                        if (file.previewElement.childNodes[3].childNodes[1].childNodes[1].childNodes[0].src) {
                            file.previewElement.childNodes[3].childNodes[1].childNodes[1].childNodes[0].classList.add("col");
                        }
                        file.previewElement.childNodes[7].childNodes[1].value = file.xhr.responseText;
                    }
                    file.url = file.xhr.responseText
                    document.querySelectorAll('fileUrl{{$property}}')
                    const els = document.querySelectorAll('.fileUrl{{$property}}');
                    const values = [].map.call(els, el => el.value);
                    @this.
                    value = values;
                    if (@this.
                    autoUpload == false && myDropzone.getQueuedFiles().length <= 0
                )
                    {
                        // 隐藏按钮
                        document.querySelector('#uploadArea{{$property}}').querySelector('#uploadBtn').classList.remove('show')
                    }
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
                    console.log(file.previewElement)

                    if (@this.
                    autoUpload == false && myDropzone.getQueuedFiles().length <= 0
                )
                    {
                        // 隐藏按钮
                        console.log(document.querySelector('#uploadArea{{$property}}'));
                        document.querySelector('#uploadArea{{$property}}').querySelector('#uploadBtn').classList.remove('show')
                    }
                })

                myDropzone.on("addedfile", function (file) {
                    if (@this.
                    autoUpload == false && file.previewElement
                )
                    {
                        // 显示上传按钮
                        file.previewElement.parentNode.parentNode.querySelector('#uploadBtn').classList.add('show')
                    }
                })

                $('#uploadArea{{$property}} #uploadBtn').click(function () {
                    myDropzone.processQueue();
                });
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
