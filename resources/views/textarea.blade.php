<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        <textarea class="form-control" wire:model.lazy="value" rows="{{$rows}}"
                  placeholder="{{$placeHolder}}"></textarea>
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
</div>