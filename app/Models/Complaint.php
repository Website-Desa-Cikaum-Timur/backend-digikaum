<?php

namespace App\Models;

use App\Shared\Concerns\HasUlid;
use App\Shared\Enums\ComplaintStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Complaint extends Model implements HasMedia
{
    use HasFactory, HasUlid, InteractsWithMedia, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'tracking_code',
        'title',
        'slug',
        'content',
        'reporter_name',
        'reporter_phone',
        'category',
        'is_anonymous',
        'status',
    ];

    protected $casts = [
        'status' => ComplaintStatus::class,
        'is_anonymous' => 'boolean',
    ];

    public function scopeTrackingCode(Builder $query, string $code): Builder
    {
        return $query->where('tracking_code', $code);
    }

    protected static function booted(): void
    {
        $clearCache = function () {
            Cache::forget('dashboard_pending_complaints');
        };

        static::created($clearCache);
        static::updated($clearCache);
        static::deleted($clearCache);
        static::restored($clearCache);
    }
}
