@if($errors && (($errors->has($property) && $message = $errors->first($property)) || ($errors->has('value') && $message = $errors->first('value'))))
    <span id="input-{{$property}}-error" class="error invalid-feedback">{{$message}}</span>
@endif