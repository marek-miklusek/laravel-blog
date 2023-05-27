<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
    /**
     * Will delete the old thumbnail on the edit page if it was replaced by a new thumbnail
     */
    public function saved(Post $post): void
    {
        if ($post->isDirty('thumbnail') && is_null($post->thumbnail)) {
            Storage::disk('public')->delete($post->getOriginal('thumbnail'));
        }
    }


    /**
     * Will delete the thumbnail when the Post is deleted
     */
    public function deleted(Post $post): void
    {
        if ( ! is_null($post->thumbnail) ) {
            Storage::disk('public')->delete($post->thumbnail);
        }
    }
}
