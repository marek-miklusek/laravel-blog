<div>
    @livewire('comment-create', ['post' => $post])

    @foreach ($comments as $comment)
        @livewire('comment-item', ['comment' => $comment], key("comment-$comment->id-$comment->comments->count()"))
    @endforeach
    
    {{ $comments->links() }}
</div>
