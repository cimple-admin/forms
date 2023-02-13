@once
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('update{{ucfirst($property)}}', value => {
                    if (@this.
                    value !== value
                )
                    {
                        @this.
                        notifyParentUpdate = false
                                @this.value = value
                        setTimeout(function () {
                            @this.
                            notifyParentUpdate = true

                        }, 100)
                    }
                })
            })
        </script>
    @endpush
@endonce