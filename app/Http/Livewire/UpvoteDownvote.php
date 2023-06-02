<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class UpvoteDownvote extends Component
{
    public Post $post;


    public function mount(Post $post)
    {
        $this->post = $post;
    }


    public function render()
    {
        $upvotes = \App\Models\UpvoteDownvote::where('post_id', '=', $this->post->id)
            ->where('is_upvote', true)
            ->count();

        $downvotes = \App\Models\UpvoteDownvote::where('post_id', '=', $this->post->id)
            ->where('is_upvote', false)
            ->count();

        // The status whether current user has upvoted the post or not
        // This will be null, true, or false
        // null means user has not done upvote or downvote
        $has_upvote = null;

        $user = request()->user();

        if ($user) {
            $model = \App\Models\UpvoteDownvote::where('post_id', '=', $this->post->id)->where('user_id', '=', $user->id)->first();
            if ($model) {
                $has_upvote = $model->is_upvote;
            }
        }

        return view('livewire.upvote-downvote', compact('upvotes', 'downvotes', 'has_upvote'));
    }

    
    public function upvoteDownvote($upvote = true)
    { 
        /** @var \App\Models\User $user */
        $user = request()->user();
        
        if ( ! $user ) {
            session()->flash('message', 'You have to log in first');
            return redirect()->route('login');
        }
        // if ( ! $user->hasVerifiedEmail() ) {
        //     return redirect()->route('verification.notice');
        // }

        $model = \App\Models\UpvoteDownvote::where('post_id', '=', $this->post->id)->where('user_id', '=', $user->id)->first();

        if ( ! $model ) {
            \App\Models\UpvoteDownvote::create([
                'is_upvote' => $upvote,
                'post_id' => $this->post->id,
                'user_id' => $user->id
            ]);

            return;
        }

        if ($upvote && $model->is_upvote || ! $upvote && ! $model->is_upvote) {
            $model->delete();
        } 
        else {
            $model->is_upvote = $upvote;
            $model->save();
        }
    }
}
