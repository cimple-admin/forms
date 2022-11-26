<div class="form-control w-full max-w-xs">
    <label class="label">
        <span class="label-text">{{$label}}</span>
    </label>
    @foreach($options as $optionValue => $option)
        <label class="label cursor-pointer">
            <input wire:model="value" type="checkbox" value="{{$optionValue}}" class="checkbox checkbox-primary" />
            <span class="label-text">{{$option}}</span>
        </label>
    @endforeach
</div>
