<?php

namespace App\Models;

use App\Shared\Concerns\HasUlid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

class PostCategory extends Model
{
    use HasFactory, HasUlid;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'post_category_id');
    }

    protected static function booted(): void
    {
        $clearCache = function () {
            Cache::forget('post_categories_active');
        };

        static::created($clearCache);
        static::updated($clearCache);
        static::deleted($clearCache);
    }
}
