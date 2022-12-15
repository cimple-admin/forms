<div class="form-control">
    @if(!$hiddenLabel)
        <label class="label">
            <span class="label-text">{{$label}}</span>
        </label>
    @endif

    <div wire:ignore>
        <select  wire:ignore.self class="select select-primary w-full"
                 data-trigger
                 id="choices-multiple-default"
                 placeholder="This is a placeholder"
                 multiple
        >
            @foreach($options as $optionValue => $option)
                <option value="{{$optionValue}}">{{$option}}</option>
            @endforeach
        </select>
    </div>

    <span class="label-text-alt">
        @error('value')
            <span class="error text-error">{{ $message }}</span>
        @else
            @error('value.*')
            <span class="error text-error">{{ $message }}</span>
            @enderror
            @enderror
    </span>
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

            if (@this.value) {
                choices.setChoiceByValue(@this.value)
            }
        })
    </script>
</div>