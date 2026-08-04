<?php

namespace Database\Seeders;

use App\Models\Complaint;
use App\Models\Location;
use App\Models\Official;
use App\Models\Organization;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class VillageDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $this->command->info('Membangun data SOTK Desa...');
            Organization::factory(4)->create()->each(function ($org) {
                Official::factory(random_int(2, 5))->create([
                    'organization_id' => $org->id,
                ]);
            });

            $this->command->info('Membangun data Berita & Kategori...');
            $editor = User::where('email', 'editor@digikaum.test')->first() ?? User::factory()->create();

            PostCategory::factory(5)->create()->each(function ($category) use ($editor) {
                Post::factory(random_int(3, 8))->create([
                    'post_category_id' => $category->id,
                    'author_id' => $editor->id,
                ]);
            });

            $this->command->info('Membangun data Titik Peta Spasial...');
            Location::factory(20)->create();

            $this->command->info('Membangun data Pengaduan Masyarakat...');
            Complaint::factory(15)->create();
        });

        Cache::flush();
        $this->command->info('Seluruh Cache telah dibersihkan.');
    }
}
