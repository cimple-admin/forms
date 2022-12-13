<div class="form-control">
    @if(!$hiddenLabel)
        <label class="label">
            <span class="label-text">{{$label}}</span>
        </label>
    @endif

    <select wire:model="value">
        @foreach($options as $optionValue => $option)
            <option value="{{$optionValue}}">{{$option}}</option>
        @endforeach
    </select>

    <span class="label-text-alt">
        @error('value')
            <span class="error text-error">{{ $message }}</span>
        @else
            @error('value.*')
                <span class="error text-error">{{ $message }}</span>
            @enderror
        @enderror
    </span>
</div>