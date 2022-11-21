<div class="form-control w-full max-w-xs">
    @foreach($forms as $form => $params)
{{--        <livewire:is component="Input2" message="放大范德萨" />--}}
        @livewire($form, $params)
    @endforeach
</div>