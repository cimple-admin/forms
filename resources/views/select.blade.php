<div class="form-group  {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div class="{{ $inline ? 'col-sm-' . (12 - $inlineLabelWidth) : '' }}">
        <select name="{{$property}}" wire:model="value" class="custom-select">
            <option>请选择</option>
            @foreach($options as $optionValue => $option)
                <option value="{{$optionValue}}">{{$option}}</option>
            @endforeach
        </select>
        @include('form::base.errors')
        @include('form::base.hint')
    </div>

</div>

@once
    @push('scripts')
        <script>
            Livewire.on('update{{ucfirst($property)}}', value => {
                $('select[name="{{$property}}"]').val(value)
            })
        </script>
    @endpush
@endonce
