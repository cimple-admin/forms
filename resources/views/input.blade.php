<div class="form-group {{ $inline ? 'row' : '' }}">
    @if($label && !$hiddenLabel)
        <label for="input-{{$property}}" class="{{ $inline ? 'col-sm-2' : '' }} col-form-label">{{$label}}</label>
    @endif
    <div class="{{ $inline ? 'col-sm-10' : '' }}">
        <input type="{{$type}}" name="{{$property}}" wire:model="value" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" id="input-{{$property}}" placeholder="{{$placeHolder}}">
        @error('value')
        <span id="input-{{$property}}-error" class="error invalid-feedback">{{ $message }}</span>
        @enderror
        @if($hint)
            <span id="input-{{$property}}-hint" class="small"><i class="far fa-question-circle"></i> {{ $hint }}</span>
        @endif
    </div>
</div>

