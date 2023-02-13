<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        <input type="{{$type}}" name="{{$property}}" wire:model.lazy="value"
               class="form-control {{ ($errors && ($errors->has($property) || $errors->has('value'))) ? 'is-invalid' : '' }}"
               id="input-{{$property}}"
               placeholder="{{$placeHolder}}">

        @include('form::base.errors')
        @include('form::base.hint')
    </div>
</div>
@include('form::base.update-event')
