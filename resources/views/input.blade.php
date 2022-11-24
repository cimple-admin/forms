<div class="form-control w-full max-w-xs">
    <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text">{{$label}}</span>
        </label>
        <input type="{{$type}}" wire:model="value" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        <label class="label">
            <span class="label-text-alt">
                @error('value')
                    <span class="error text-error">{{ $message }}</span>
                @else
                    {{$hint}}
                @enderror
                {{$hint}}
             </span>
        </label>
    </div>
</div>