<div class="form-control w-full max-w-xs">
    <div class="form-control w-full max-w-xs">
        <label class="label">
            <span class="label-text">What is your name?</span>
            <span class="label-text-alt">Alt label</span>
        </label>
        <input type="{{$type}}" wire:model="message" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
        @error('message') <span class="error">{{ $message }}</span> @enderror

        <label class="label">
            <span class="label-text-alt">Alt label</span>
            <span class="label-text-alt">Alt label</span>
        </label>
    </div>
    {{$message}}
</div>