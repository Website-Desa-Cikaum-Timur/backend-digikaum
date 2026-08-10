<?php

namespace App\Models;

use App\Shared\Concerns\HasUlid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use HasFactory, HasUlid, InteractsWithMedia;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'author_id',
        'post_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'status',
        'is_highlight',
        'views_count',
        'published_at',
    ];

    protected $casts = [
        'is_highlight' => 'boolean',
        'views_count' => 'integer',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published')
            ->where('published_at', '<=', now());
    }

    protected static function booted(): void
    {
        $clearCache = function () {
            Cache::forget('post_categories_active');
            Cache::forget('dashboard_published_posts');
        };

        static::created($clearCache);
        static::updated($clearCache);
        static::deleted($clearCache);
    }
}
