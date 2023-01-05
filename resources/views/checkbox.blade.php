<div class="form-group {{ $inline ? 'row' : '' }}">
    @if($label && !$hiddenLabel)
        <label for="input-{{$property}}" class="{{ $inline ? 'col-sm-2' : '' }} col-form-label">{{$label}}</label>
    @endif
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        @foreach($options as $optionValue => $option)
            <div class="custom-control  {{$type == 'toggle' ? 'custom-switch' : 'custom-checkbox'}}">
                <input type="checkbox"  wire:model="value" value="{{$optionValue}}" class="custom-control-input  {{ $errors->has('value') ? 'is-invalid' : '' }}"  id="checkBox-{{$property}}-{{$optionValue}}">
                <label class="custom-control-label" for="checkBox-{{$property}}-{{$optionValue}}">{{$option}}</label>
            </div>
        @endforeach
        @error('value')
        <span id="input-{{$property}}-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
        @if($hint)
            <span id="input-{{$property}}-hint" class="small"><i class="far fa-question-circle"></i> {{ $hint }}</span>
        @endif
    </div>
</div>

