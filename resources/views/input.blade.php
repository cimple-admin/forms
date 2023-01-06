<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        <input type="{{$type}}" name="{{$property}}" wire:model="value" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" id="input-{{$property}}" placeholder="{{$placeHolder}}">
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
</div>

