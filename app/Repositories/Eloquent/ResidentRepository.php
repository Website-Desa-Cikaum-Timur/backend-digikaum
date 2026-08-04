<?php

namespace App\Repositories\Eloquent;

use App\Models\Resident;
use App\Repositories\Contracts\ResidentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Shared\Enums\GenderType;

class ResidentRepository extends BaseRepository implements ResidentRepositoryInterface
{
    public function __construct(Resident $model)
    {
        parent::__construct($model);
    }

    public function findByNik(string $nik): ?Model
    {
        return $this->model->where('nik', $nik)->first();
    }

    public function isNikExists(string $nik): bool
    {
        return $this->model->where('nik', $nik)->exists();
    }

    public function getDemographicStats(): array
    {
        return Cache::remember('demographic_stats', now()->addDay(), function () {
            $activeQuery = $this->model->where('is_active', true);
            $total = $activeQuery->count();

            if ($total === 0) {
                return [
                    'total' => 0,
                    'gender' => ['male_percentage' => 0, 'female_percentage' => 0],
                    'age' => ['youth_percentage' => 0, 'productive_percentage' => 0, 'elderly_percentage' => 0],
                    'last_updated' => now()->toIso8601String(),
                ];
            }

            $maleCount = (clone $activeQuery)->where('gender', GenderType::Male->value)->count();
            $femaleCount = $total - $maleCount;

            $date15YearsAgo = now()->subYears(15)->format('Y-m-d');
            $date65YearsAgo = now()->subYears(65)->format('Y-m-d');

            $youthCount = (clone $activeQuery)->where('date_of_birth', '>', $date15YearsAgo)->count();

            $elderlyCount = (clone $activeQuery)->where('date_of_birth', '<=', $date65YearsAgo)->count();

            $productiveCount = $total - ($youthCount + $elderlyCount);

            return [
                'total' => $total,
                'gender' => [
                    'male_percentage' => round(($maleCount / $total) * 100, 1),
                    'female_percentage' => round(($femaleCount / $total) * 100, 1),
                ],
                'age' => [
                    'youth_percentage' => round(($youthCount / $total) * 100, 1),
                    'productive_percentage' => round(($productiveCount / $total) * 100, 1),
                    'elderly_percentage' => round(($elderlyCount / $total) * 100, 1),
                ],
                'last_updated' => now()->toIso8601String(),
            ];
        });
    }
}