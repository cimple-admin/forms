<div class="form-control w-full max-w-xs">
    @if(!$hiddenLabel)
        <label class="label">
            <span class="label-text">{{$label}}</span>
        </label>
    @endif

    @foreach($options as $optionValue => $option)
        <label class="label cursor-pointer">
            <span class="label-text">{{$option}}</span>
            <input wire:model="value" name="{{$value}}" type="radio" value="{{$optionValue}}" class="radio radio-primary"/>
        </label>
    @endforeach
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