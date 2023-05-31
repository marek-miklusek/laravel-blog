<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'thumbnail', 'body', 'user_id', 'active', 'published_at'];
    protected $casts = ['published_at' => 'datetime'];
    

    /*
    |--------------------------------------------------------------------------
    | Relationships between models (tables in DB)
    |--------------------------------------------------------------------------
    */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }


    /*
    |--------------------------------------------------------------------------
    | Public function
    |--------------------------------------------------------------------------
    */

    public function teaser($words = 30): string
    {
        return Str::words(strip_tags($this->body), $words);
    }

    public function formatDate(): string
    {
        return $this->published_at->format('jS F Y');
    }


    public function thumbnail()
    {
        if (is_null($this->thumbnail)) return false;

        if (str_starts_with($this->thumbnail, 'http')) {
            return $this->thumbnail;
        }

        return '/storage/' . $this->thumbnail;
    }


    public function humanReadTime(): Attribute
    {
        return new Attribute(
            get: function ($value, $attributes) {
                $words = Str::wordCount(strip_tags($attributes['body']));
                $minutes = ceil($words / 150);

                return $minutes . ' ' . str('min')->plural($minutes) . ' read'.', '
                    . $words . ' ' . str('word')->plural($words);
            }
        );
    }
}


