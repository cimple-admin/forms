<div class="form-group {{ $inline ? 'row' : '' }}">
    @include('form::base.label')
    <div wire:ignore  class="{{ $inline ? 'col-sm-10' : '' }}">
        <select wire:ignore.self class="select select-primary w-full"
                data-trigger
                id="choices-multiple-default"
                placeholder="This is a placeholder"
                multiple
        >
            @foreach($options as $optionValue => $option)
                <option value="{{$optionValue}}">{{$option}}</option>
            @endforeach
        </select>
        @include('form::base.errors')
        @include('form::base.hint')
    </div>
    @once
        @push('style')
            <link rel="stylesheet" href="{{asset('/vendor/forms/choices/styles/choices.css')}}">
            <style>
                .choices__list--multiple .choices__item {
                    background-color: #0071BC;
                    border: 1px solid #0071BC;
                    border-radius: 0px;
                }
            </style>
        @endpush
        @push('scripts')
            <script src="{{asset('/vendor/forms/choices/scripts/choices.min.js')}}"></script>
            <script>
                document.addEventListener('livewire:load', function () {
                    const element = document.querySelector('#choices-multiple-default');
                    const choices = new Choices(element, {
                        allowHTML: true,
                        removeItems: true,
                        removeItemButton: true,
                    });
                    choices.passedElement.element.addEventListener(
                        'change',
                        function (event) {
                            // do something creative here...
                            @this.value = choices.getValue(true);
                        },
                        false,
                    );

                    if (@this.value)
                    {
                        choices.setChoiceByValue(@this.value)
                    }
                })
            </script>
        @endpush
    @endonce
</div>