<?php

namespace App\Filament\Resources\Families\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class FamiliesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kk_number')
                    ->label('Nomor Kartu Keluarga (KK)')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Nomor KK disalin!')
                    ->weight('bold'),

                TextColumn::make('head_of_family_name')
                    ->label('Kepala Keluarga')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rt')
                    ->label('RT/RW')
                    ->formatStateUsing(fn ($record) => "RT {$record->rt} / RW {$record->rw}")
                    ->searchable(['rt', 'rw']),

                TextColumn::make('residents_count')
                    ->label('Total Anggota')
                    ->counts('residents')
                    ->badge()
                    ->color('info'),

                TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TrashedFilter::make()
                    ->label('Data Terhapus (Sampah)'),
            ])
            ->recordActions([
                EditAction::make()->label('Kelola KK'),
                DeleteAction::make()->label('Hapus Sementara'),
                ForceDeleteAction::make()->label('Hapus Permanen'),
                RestoreAction::make()->label('Kembalikan'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ])->label('Aksi Massal'),
            ]);
    }
}
