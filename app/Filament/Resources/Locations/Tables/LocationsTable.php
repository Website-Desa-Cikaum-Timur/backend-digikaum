<?php

namespace App\Filament\Resources\Locations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LocationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('photo')
                    ->label('Foto')
                    ->collection('location_photos')
                    ->square(),

                TextColumn::make('name')
                    ->label('Nama Lokasi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => ucwords(str_replace('_', ' ', $state)))
                    ->searchable(),

                IconColumn::make('is_active')
                    ->label('Publik')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'kantor_desa' => 'Kantor Desa',
                        'umkm' => 'UMKM',
                        'fasilitas_kesehatan' => 'Fasilitas Kesehatan',
                        'fasilitas_pendidikan' => 'Fasilitas Pendidikan',
                        'ibadah' => 'Tempat Ibadah',
                        'rawan_bencana' => 'Rawan Bencana',
                    ]),
            ])
            ->recordActions([
                EditAction::make()->label('Kelola'),
                DeleteAction::make()->label('Hapus'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
