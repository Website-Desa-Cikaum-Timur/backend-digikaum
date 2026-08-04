<?php

namespace App\Filament\Resources\PostCategories\Schemas;

use App\Models\PostCategory;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kategori')
                    ->description('Kelola penamaan dan status visibilitas kategori berita.')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Kategori')
                            ->placeholder('Contoh: Inovasi Desa')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),

                        TextInput::make('slug')
                            ->label('Tautan Web (URL)')
                            ->helperText('Dihasilkan otomatis dari nama kategori. Tidak perlu diisi.')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255)
                            ->unique(PostCategory::class, 'slug', ignoreRecord: true),

                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->placeholder('Jelaskan secara singkat peruntukan kategori ini...')
                            ->maxLength(500)
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->helperText('Jika dinonaktifkan, kategori ini tidak akan bisa dipilih saat membuat berita baru.')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }
}
