<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Shared\Enums\PublicationStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover_image')
                    ->label('Cover')
                    ->collection('post_covers')
                    ->square(),

                TextColumn::make('title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable()
                    ->wrap()
                    ->description(fn ($record) => 'Kategori: ' . ($record->category->name ?? '-')),

                TextColumn::make('author.name')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        PublicationStatus::Published->value => 'Terbit',
                        PublicationStatus::Draft->value => 'Konsep',
                        PublicationStatus::Archived->value => 'Arsip',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        PublicationStatus::Published->value => 'success',
                        PublicationStatus::Draft->value => 'gray',
                        PublicationStatus::Archived->value => 'danger',
                        default => 'primary',
                    }),

                IconColumn::make('is_highlight')
                    ->label('Sorotan')
                    ->boolean()
                    ->trueIcon('heroicon-s-star')
                    ->trueColor('warning'),

                TextColumn::make('views_count')
                    ->label('Dilihat')
                    ->numeric()
                    ->sortable()
                    ->alignRight()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('published_at')
                    ->label('Tayang Pada')
                    ->dateTime('d M Y - H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('post_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->indicator('Kategori'),

                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        PublicationStatus::Published->value => 'Terbit',
                        PublicationStatus::Draft->value => 'Konsep',
                        PublicationStatus::Archived->value => 'Arsip',
                    ])
                    ->indicator('Status'),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Ubah'),
                DeleteAction::make()
                    ->label('Hapus'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih'),
                ])->label('Aksi Massal'),
            ])
            ->defaultSort('published_at', 'desc');
    }
}
