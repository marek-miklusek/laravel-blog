<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'image', 'title', 'content', 'active'];


    /*
    |--------------------------------------------------------------------------
    | Getters
    |--------------------------------------------------------------------------
    */

    public static function getWidget(string $key, $value): string
    {
        // Try to get widget from cache, if the widget does not exists in the cache then execute the query
        $widget = Cache::get('text-widget-' . $key, function () use ($key) {
            return TextWidget::query()->where('key', $key)->first();
        });

        if ( ! $widget ) {
            return '';
        }

        switch ($value) {
            case 'title':
                return $widget->title;
                break;
            case 'content':
                return $widget->content;
                break;
            
            default:
                return '';
                break;
        }
    }
}
