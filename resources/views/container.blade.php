<div class="">
    @foreach($forms as $form => $params)
        @php
            if (str_contains($form, ':')) {
                $form = explode(':', $form)[0];
            }
            $this->emit('update' . ucfirst($params['property']), $params['value']);
        @endphp
        @livewire($form, $params, key($params['property'] ))
    @endforeach
</div>