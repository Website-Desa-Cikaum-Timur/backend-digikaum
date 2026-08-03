<?php

namespace App\Filament\Resources\Complaints\Tables;

use App\Shared\Enums\ComplaintStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ComplaintsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tracking_code')
                    ->label('No. Resi')
                    ->searchable()
                    ->copyable()
                    ->copyMessage('Resi disalin!')
                    ->weight('bold'),

                TextColumn::make('title')
                    ->label('Topik')
                    ->searchable()
                    ->wrap(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state?->label())
                    ->color(fn ($state) => match ($state) {
                        ComplaintStatus::Pending => 'danger',
                        ComplaintStatus::Processing => 'warning',
                        ComplaintStatus::Resolved => 'success',
                        ComplaintStatus::Rejected => 'gray',
                        default => 'primary',
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y - H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options(ComplaintStatus::options()),
                TrashedFilter::make()
                    ->label('Data Terhapus'),
            ])
            ->recordActions([
                EditAction::make()->label('Proses / Tindak Lanjut'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Hapus Sementara'),
                    ForceDeleteBulkAction::make()->label('Hapus Permanen'),
                    RestoreBulkAction::make()->label('Kembalikan Data'),
                ])->label('Aksi Massal'),
            ]);
    }
}
