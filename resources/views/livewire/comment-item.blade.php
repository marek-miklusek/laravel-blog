<div class="flex justify-between mb-4 gap-3">

    <div class="w-12 h-12 flex items-center justify-center bg-gray-200 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
        </svg>
    </div>

    <div class="flex-1">
        <div>
            <a href="#" class="font-semibold text-indigo-600">
                {{ $comment->user->name }}
            </a>
            - <span class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <div class="text-gray-700">
            {{ $comment->comment }}
        </div>
        <div>
            <a wire:click.prevent="startReply" href="#" class="text-sm text-indigo-600 mr-3 hover:underline">
                Reply
            </a>
            @if (Auth::id() == $comment->user_id)
                <a wire:click.prevent="startCommentEdit" href="#" class="text-sm text-blue-600 mr-3 hover:underline">
                    Edit
                </a>
                <a wire:click.prevent="deleteComment" href="#" class="text-sm text-red-600 hover:underline">
                    Delete
                </a>
            @endif
        </div>
        @if ($editing)
            @livewire('comment-create', ['commentModel' => $comment])
        @endif

        @if ($replying)
            @livewire('comment-create', ['post' => $comment->post, 'parentComment' => $comment])
        @endif

        @if ($comment->comments->count())
            <div class="mt-4">
                @foreach($comment->comments as $child_comment)
                    @livewire('comment-item', ['comment' => $child_comment], key("comment-$child_comment->id"))
                @endforeach
            </div>
        @endif
    </div>

</div>




