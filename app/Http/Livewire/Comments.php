<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public Post $post;

    // When event occur(e.g. event name, commentCreated) then the method or action is triggered
    protected $listeners = [
        'commentCreated' => '$refresh',
        'commentDeleted' => '$refresh',
    ];


    public function mount(Post $post)
    {
        $this->post = $post;
    }


    public function render()
    {
        $comments = $this->selectComments();
        return view('livewire.comments', compact('comments'));
    }


    private function selectComments()
    {
        return Comment::where('post_id', '=', $this->post->id)
            ->with(['post', 'user', 'comments'])
            ->whereNull('parent_id')
            ->orderByDesc('created_at')
            ->paginate(5);
    }
}
