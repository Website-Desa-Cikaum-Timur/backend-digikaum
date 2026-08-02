<?php

namespace App\Filament\Resources\Organizations\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;

class OfficialsRelationManager extends RelationManager
{
    protected static string $relationship = 'officials';

    protected static ?string $title = 'Struktur Pejabat & Anggota';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Lengkap (beserta Gelar)')
                    ->required()
                    ->maxLength(255),

                TextInput::make('position')
                    ->label('Jabatan')
                    ->placeholder('Contoh: Kepala Desa, Sekretaris')
                    ->required()
                    ->maxLength(255),

                TextInput::make('nip_nik')
                    ->label('NIP / NIK')
                    ->maxLength(255)
                    ->helperText('Opsional. Biarkan kosong jika tidak memiliki NIP.'),

                Toggle::make('is_active')
                    ->label('Status Menjabat')
                    ->default(true),

                Textarea::make('bio')
                    ->label('Biografi Singkat')
                    ->maxLength(500)
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pejabat')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip_nik')
                    ->label('NIP/NIK'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Tambah Pejabat')
                    ->after(fn () => Cache::forget('sotk_organizations_active')),
            ])
            ->actions([
                EditAction::make()
                    ->label('Ubah')
                    ->after(fn () => Cache::forget('sotk_organizations_active')),
                DeleteAction::make()
                    ->label('Hapus')
                    ->after(fn () => Cache::forget('sotk_organizations_active')),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->after(fn () => Cache::forget('sotk_organizations_active')),
                ]),
            ]);
    }
}
