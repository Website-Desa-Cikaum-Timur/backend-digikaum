<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Shared\Enums\GalleryCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Unggah Foto')
                    ->description('Pastikan foto memiliki resolusi yang baik, tidak pecah, dan relevan dengan kegiatan desa.')
                    ->components([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Pilih Foto Momen')
                            ->collection('gallery_images')
                            ->image()
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required(),
                    ]),
                Section::make('Detail Foto')
                    ->columns(2)
                    ->components([
                        TextInput::make('title')
                            ->label('Judul / Keterangan Foto')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Select::make('category')
                            ->label('Kategori Kegiatan')
                            ->options(GalleryCategory::options())
                            ->required()
                            ->native(false),
                        TextInput::make('year')
                            ->label('Tahun Momen')
                            ->numeric()
                            ->minValue(2000)
                            ->maxValue(2099)
                            ->default(now()->year)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Tampilkan di Galeri Publik')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }
}
