<!-- /resources/views/post/create.blade.php -->

@if ($errors->any())

    <ul class="notification is-danger">
        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
    </ul>

@endif

<!-- Create Post Form -->
