<a href="#" class="js-go-back">Go back</a>

@push('scripts')

<script>
    document.querySelector('.js-go-back').addEventListener('click', function (event) {
        event.preventDefault();
        window.history.back();
    });
</script>

@endpush