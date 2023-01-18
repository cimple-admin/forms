<div>
    <div id="template" class="row border-bottom upload-preview">
        <!-- This is used as the file preview template -->
        <div class="col">
            <div class="row">
                <div class="col preview col-md-auto pl-0 pr-0"><img data-dz-thumbnail/></div>
                <div class="col pl-0 align-items-center">
                    <div class="col name align-middle" data-dz-name></div>
                    <div class="col error text-danger align-middle" data-dz-errormessage></div>
                </div>
            </div>
        </div>
        <div class="col">
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
            <button type="button" data-dz-remove class="btn btn-danger delete">
                <i class="glyphicon glyphicon-trash"></i>
                <span>Delete</span>
            </button>
        </div>
    </div>
</div>