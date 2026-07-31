<?php

namespace App\Models;

use App\Shared\Concerns\HasUlid;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resident extends Model implements HasMedia
{
    use HasFactory, HasUlid, InteractsWithMedia, SoftDeletes;

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'family_id',
        'nik',
        'name',
        'place_of_birth',
        'date_of_birth',
        'gender',
        'religion',
        'education_level',
        'profession',
        'blood_type',
        'marital_status',
        'family_relation_status',
        'father_name',
        'mother_name',
        'is_active',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_active' => 'boolean',
        'gender' => GenderType::class,
        'family_relation_status' => FamilyRelation::class,
    ];

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
