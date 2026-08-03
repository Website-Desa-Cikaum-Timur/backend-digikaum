<?php

namespace App\Filament\Resources\Complaints\Pages;

use App\Filament\Resources\Complaints\ComplaintResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateComplaint extends CreateRecord
{
    protected static string $resource = ComplaintResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $date = date('Ymd');
        $randomString = strtoupper(Str::random(4));

        $data['tracking_code'] = "CMP-{$date}-{$randomString}";
        $data['slug'] = Str::slug($data['title'] . '-' . Str::random(6));

        return $data;
    }
}
