<?php

namespace App\Models;

use App\Shared\Concerns\HasUlid;
use App\Shared\Enums\GalleryCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Gallery extends Model implements HasMedia
{
    use HasFactory, HasUlid, InteractsWithMedia;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'title', 'category', 'year', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'year' => 'integer',
        'category' => GalleryCategory::class,
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
