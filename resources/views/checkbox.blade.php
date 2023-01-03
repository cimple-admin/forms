<div class="form-group {{ $inline ? 'row' : '' }}">
    @if($label && !$hiddenLabel)
        <label for="input-{{$property}}" class="{{ $inline ? 'col-sm-2' : '' }} col-form-label">{{$label}}</label>
    @endif
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        @foreach($options as $optionValue => $option)
            <div class="custom-control custom-checkbox">
                <input type="checkbox"  wire:model="value" value="{{$optionValue}}" class="custom-control-input {{$type == 'toggle' ? 'toggle' : 'checkbox'}} {{ $errors->has('value') ? 'is-invalid' : '' }}"  id="checkBox-{{$property}}-{{$option}}">
                <label class="custom-control-label" for="checkBox-{{$property}}-{{$option}}">{{$option}}</label>
            </div>
        @endforeach
        @error('value')
        <span id="input-{{$property}}-error" class="error invalid-feedback" style="display: inline;">{{ $message }}</span>
        @enderror
        @if($hint)
            <span id="input-{{$property}}-hint" class="small"><i class="far fa-question-circle"></i> {{ $hint }}</span>
        @endif
    </div>
</div>

