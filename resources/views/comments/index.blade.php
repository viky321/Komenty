<section id="comments" class="section comments columns is-centered">
    <div class="is-size-5 column is-three-quarters">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        @auth
            @include("comments.create")
        @endauth

        <ol class="comments-list">
            @foreach ($post->comments as $comment)
                <li id="comment-{{ $comment->id }}">
                    <comment :comment="{{ json_encode($comment) }}"></comment>
                </li>
            @endforeach
        </ol>

    </div>
</section>

<script>

    window.loggedInUserId = @json(auth()->id());

</script>




