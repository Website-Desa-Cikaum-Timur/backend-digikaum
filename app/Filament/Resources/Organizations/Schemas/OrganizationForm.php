<?php

namespace App\Filament\Resources\Organizations\Schemas;

use App\Models\Organization;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class OrganizationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Organisasi')
                    ->description('Kelola data lembaga, biro, atau bagian kepengurusan desa.')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Organisasi / Bagian')
                            ->placeholder('Contoh: Pemerintah Desa Cikaum Timur')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        TextInput::make('slug')
                            ->label('URL Slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(Organization::class, 'slug', ignoreRecord: true),

                        Textarea::make('description')
                            ->label('Deskripsi Tugas & Fungsi')
                            ->placeholder('Jelaskan secara singkat tugas dari organisasi ini...')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Jika dimatikan, organisasi ini beserta anggotanya tidak akan tampil di website publik.')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }
}
