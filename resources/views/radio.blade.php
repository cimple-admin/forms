<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        @foreach($options as $optionValue => $option)
            <div class="custom-control custom-radio">
                <input wire:model="value" value="{{$optionValue}}"
                       class="custom-control-input  {{  ($errors && ($errors->has($property) || $errors->has('value'))) ? 'is-invalid' : '' }}"
                       type="radio"
                       id="radio-{{$property}}-{{$optionValue}}">
                <label for="radio-{{$property}}-{{$optionValue}}" class="custom-control-label">{{$option}}</label>
            </div>
        @endforeach
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
</div>


