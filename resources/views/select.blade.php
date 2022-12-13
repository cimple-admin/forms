<div class="form-control">
    @if(!$hiddenLabel)
        <label class="label">
            <span class="label-text">{{$label}}</span>
        </label>
    @endif

    <select wire:model="value" class="select select-primary w-full"
            data-trigger
            id="choices-multiple-default"
            placeholder="This is a placeholder"
    >
        <option>请选择</option>
        @foreach($options as $optionValue => $option)
            <option value="{{$optionValue}}">{{$option}}</option>
        @endforeach
    </select>

    <span class="label-text-alt pt-2">
        @error('value')
            <span class="error text-error">{{ $message }}</span>
        @else
            @error('value.*')
            <span class="error text-error">{{ $message }}</span>
            @enderror
            @enderror
    </span>
</div>