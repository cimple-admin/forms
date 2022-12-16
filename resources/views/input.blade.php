<div class="form-control">
    <label class="label">
        <span class="label-text">{{$label}}</span>
    </label>
    <input type="{{$type}}" wire:model="value" placeholder="Type here" class="input input-bordered" />
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
    @once
        @push('scripts')
            <script>
                // Your custom JavaScript...
                console.log('abc')
            </script>
        @endpush
    @endonce
</div>
