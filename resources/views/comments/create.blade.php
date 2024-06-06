@include("errors")

<form action="/comments" method="POST" class="add-comment-form">
    @csrf

    <div class="field">
        <label class="label">Tell me what you want</label>
        <div class="control">
            <textarea rows="3" name="text" class="textarea" placeholder="be nice"></textarea>
        </div>
    </div>

    <div class="control">
        <button class="button is-warning">
            add comment
        </button>
    </div>

    <input type="hidden" name="post_id" value="{{ $post->id }}">
</form>
