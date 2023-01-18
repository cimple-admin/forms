<div>
    <div id="template" class="row border-bottom pb-1 align-middle">
        <!-- This is used as the file preview template -->

        <div class="col row">
            <div class="preview col-md-auto pl-0 pr-0"><img style="width: 60px;height: 60px;" data-dz-thumbnail/></div>
            <div class="col pl-0">
                <p class="name" data-dz-name></p>
                <strong class="error text-danger" data-dz-errormessage></strong>
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