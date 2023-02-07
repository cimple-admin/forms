<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        @foreach($options as $optionValue => $option)
            <div class="custom-control  {{$type == 'toggle' ? 'custom-switch' : 'custom-checkbox'}}">
                <input type="checkbox" wire:model="value" value="{{$optionValue}}"
                       class="custom-control-input  {{ $errors->has('value') ? 'is-invalid' : '' }} {{ $errors->has('value.*') ? 'is-invalid' : '' }}"
                       id="checkBox-{{$property}}-{{$optionValue}}">
                <label class="custom-control-label" for="checkBox-{{$property}}-{{$optionValue}}">{{$option}}</label>
            </div>
        @endforeach
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
</div>

