<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];


    /*
    |--------------------------------------------------------------------------
    | Relationships between models (tables in DB)
    |--------------------------------------------------------------------------
    */
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    
    public function publishedPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class)
            ->where('active', '=', 1)
            ->whereDate('published_at', '<', Carbon::now());
    }
}
