<comment :comment="{{ json_encode($comment) }}"></comment>
<article class="comment">

    <div class="content">
        {{ $comment->text }}
    </div>

    <footer class="meta">
        <a href="/users/{{ $comment->user->id }}" class="author">
            <strong>{{ $comment->user->name }}</strong>
        </a>
        <time datetime="{{ $comment->created_at->toDateString() }}" class="has-text-grey">
            {{ $comment->created_at->format('Y/m/d') }}
        </time>
    </footer>

</article>
