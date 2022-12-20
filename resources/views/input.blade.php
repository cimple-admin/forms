<div class="form-group">
    <label for="input-{{$property}}">{{$label}}</label>
    <input type="{{$type}}" name="{{$property}}" wire:model="value" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" id="input-{{$property}}" placeholder="Enter email">
    @error('value')
    <span id="input-{{$property}}-error" class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
