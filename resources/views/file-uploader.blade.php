<div class="form-control">
    <label class="label">
        <span class="label-text">{{$label}}</span>
    </label>
    <div id="{{$property}}UploadContainer"
         class="file_upload p-5 relative w-full border-4 border-dotted border-gray-300 rounded-lg">
        <svg class="text-indigo-500 w-24 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
        </svg>
        <div class="input_field flex flex-col w-max mx-auto text-center">
            <label>
                <input id="{{$property}}UploadBtn" class="text-sm cursor-pointer w-36 hidden" type="file" multiple/>
                <div class="text bg-indigo-600 text-white border border-gray-300 rounded font-semibold cursor-pointer p-1 px-3 hover:bg-indigo-500">
                    Select
                </div>
            </label>

            <div class="title text-indigo-500 uppercase">or drop files here</div>
        </div>
    </div>
    <label class="label">
        <span class="label-text-alt">
            @error('value')
                <span class="error text-error">{{ $message }}</span>
            @else
                {{$hint}}
                @enderror
                {{$hint}}
         </span>
    </label>
    @once
        @push('style')
        @endpush
        @push('scripts')
            <script src="{{asset('/vendor/forms/plupload/plupload.full.min.js')}}"></script>
            <!-- activate Georgian translation -->
            <script type="text/javascript" src="{{asset('/vendor/forms/plupload/i18n/zh_CN.js')}}"></script>
            <script !src="">
                document.addEventListener('livewire:load', function () {
                    const containerEle = document.getElementById(@this.property + 'UploadContainer')
                    var uploader = new plupload.Uploader({
                        runtimes: 'html5',
                        drop_element: containerEle,
                        browse_button: @this.property + 'UploadBtn', // you can pass in id...
                        container: containerEle, // ... or DOM Element itself

                        url: "/cimple-admin/form/file/upload",

                        chunk_size: '10mb',
                        filters: {
                            max_file_size: '1000mb',
                            // mime_types: [
                            //     {title : "Image files", extensions : "jpg,gif,png"},
                            //     {title : "Zip files", extensions : "zip"}
                            // ]
                        },


                        init: {
                            PostInit: function () {
                                // document.getElementById('filelist').innerHTML = '';
                                //
                                // document.getElementById('uploadfiles').onclick = function () {
                                //     uploader.start();
                                //     return false;
                                // };
                            },

                            FilesAdded: function (up, files) {
                                plupload.each(files, function (file) {
                                    console.log(file);
                                });
                                uploader.start();
                            },

                            UploadProgress: function (up, file) {
                                console.log(file.percent);
                            },

                            Error: function (up, err) {
                                console.log(err);
                            }
                        }
                    });

                    uploader.init();
                })

            </script>
        @endpush
    @endonce
</div>
