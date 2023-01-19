@if(!isset($isExist) || !$isExist)
    <div>
        @endif
        <div @if(!isset($isExist) || !$isExist)id="template"@endif @class(['row', 'border-bottom', 'upload-preview','dz-processing' => (isset($isExist) && $isExist),'dz-success' => (isset($isExist) && $isExist),'dz-complete' => (isset($isExist) && $isExist),])>
            <!-- This is used as the file preview template -->
            <div class="col">
                <div class="row">
                    <div class="col preview col-md-auto pl-0 pr-0">
                        @php
                            $imgUrl = '';
                            if (isset($url) && $url) {
                                $urlExplodeArr = explode('.', $url);
                                $ext = $urlExplodeArr[count($urlExplodeArr) - 1];
                                if (in_array($ext, ['apng', 'gif', 'jpg', 'jpeg', 'jfif', 'pjpeg', 'pjp', 'png', 'webp', 'svg'])) {
                                    $imgUrl = asset('/storage/upload/' . $url);
                                }
                            }
                        @endphp
                        <img data-dz-thumbnail src="{{$imgUrl}}" @if($imgUrl)style="width: 60px; height: 60px;" @endif/>
                    </div>
                    <div class="col pl-0 align-items-center">
                        <div class="col name align-middle" data-dz-name>
                            @if(isset($isExist) && $isExist && $url)
                                {{$url}}
                            @endif
                        </div>
                        <div class="col error text-danger align-middle" data-dz-errormessage></div>
                    </div>
                </div>
            </div>
            <div @class(['col', 'upload-finish' => (isset($isExist) && $isExist)])>
                <p class="size" data-dz-size></p>
                <div
                        class="progress active"
                        aria-valuemin="0"
                        aria-valuemax="100"
                        aria-valuenow="0"
                >
                    <div
                            class="progress-bar progress-bar-striped progress-bar-animated progress-bar-success"
                            style="width: 0%"
                            role="progressbar"
                            data-dz-uploadprogress
                    ></div>
                </div>
            </div>
            <div class="col-md-auto d-flex align-items-center">
                <input class="fileUrl{{$property}}" type="hidden" @if(isset($url) && $url)value="{{$url}}" @endif>
                <button type="button" data-dz-remove class="btn btn-danger delete"
                        @if(isset($isExist) && $isExist && $url)
                            onclick="removeExistFile(this);"
                        @endif
                >
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
            </div>
        </div>
        @if(!isset($isExist) || !$isExist)
    </div>
@endif