<?php

namespace App\Filament\Widgets;

use App\Models\Complaint;
use App\Models\Family;
use App\Models\Post;
use App\Models\Resident;
use App\Shared\Enums\ComplaintStatus;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Cache;

class DashboardStatsOverview extends BaseWidget
{
    protected ?string $pollingInterval = '60s';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $ttl = now()->addMinutes(15);

        $totalResidents = Cache::remember('dashboard_total_residents', $ttl, function () {
            return Resident::where('is_active', true)->count();
        });

        $totalFamilies = Cache::remember('dashboard_total_families', $ttl, function () {
            return Family::count();
        });

        $pendingComplaints = Cache::remember('dashboard_pending_complaints', $ttl, function () {
            return Complaint::whereIn('status', [
                ComplaintStatus::Pending->value,
                ComplaintStatus::Processing->value,
            ])->count();
        });

        $publishedPosts = Cache::remember('dashboard_published_posts', $ttl, function () {
            return Post::published()->count();
        });

        return [
            Stat::make('Total Penduduk', number_format($totalResidents, 0, ',', '.'))
                ->description('Pertumbuhan warga aktif')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([5, 12, 18, 24, 25, 29, $totalResidents])
                ->color('success')
                ->url(route('filament.admin.resources.families.index')),

            Stat::make('Kepala Keluarga', number_format($totalFamilies, 0, ',', '.'))
                ->description('Distribusi kartu keluarga')
                ->descriptionIcon('heroicon-m-user-group')
                ->chart([2, 5, 8, 12, 15, 18, $totalFamilies])
                ->color('info')
                ->url(route('filament.admin.resources.families.index')),

            Stat::make('Aduan Masuk', $pendingComplaints)
                ->description($pendingComplaints > 0 ? 'Perlu segera ditindaklanjuti' : 'Semua aduan tertangani')
                ->descriptionIcon($pendingComplaints > 0 ? 'heroicon-m-exclamation-circle' : 'heroicon-m-check-badge')
                ->chart($pendingComplaints > 0 ? [0, 2, 1, 4, 2, 5, $pendingComplaints] : [5, 4, 2, 1, 0, 0, 0])
                ->color($pendingComplaints > 0 ? 'danger' : 'success')
                ->url(route('filament.admin.resources.complaints.index')),

            Stat::make('Publikasi Berita', number_format($publishedPosts, 0, ',', '.'))
                ->description('Aktivitas pusat informasi')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([1, 2, 2, 3, 5, 7, $publishedPosts])
                ->color('primary')
                ->url(route('filament.admin.resources.posts.index')),
        ];
    }
}
