<div class="form-control w-full">
    @foreach($forms as $form => $params)
        @php
            if (str_contains($form, ':')) {
                $form = explode(':', $form)[0];
            }
        @endphp
        @livewire($form, $params, key($loop->index))
    @endforeach
</div>