<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use App\Shared\Enums\ProductCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Produk & Layanan')
                    ->description('Masukkan detail barang atau jasa yang ditawarkan oleh warga desa.')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Produk / Jasa')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        TextInput::make('slug')
                            ->label('URL Slug')
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->unique(Product::class, 'slug', ignoreRecord: true),
                        Select::make('category')
                            ->label('Kategori Usaha')
                            ->options(ProductCategory::options())
                            ->required()
                            ->native(false),
                        TextInput::make('price')
                            ->label('Estimasi Harga (Opsional)')
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(0),
                        Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
                Section::make('Informasi Pemilik & Kontak')
                    ->columns(2)
                    ->components([
                        TextInput::make('owner_name')
                            ->label('Nama Pemilik / Pengelola')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone_number')
                            ->label('Nomor WhatsApp')
                            ->tel()
                            ->prefix('+62')
                            ->maxLength(20)
                            ->helperText('Awali dengan angka 8 (contoh: 8123456789). Digunakan untuk tombol Beli via WA.'),
                    ]),
                Section::make('Visualisasi & Status')
                    ->columns(1)
                    ->components([
                        SpatieMediaLibraryFileUpload::make('image')
                            ->label('Foto Produk Utama')
                            ->collection('product_images')
                            ->image()
                            ->imageEditor()
                            ->maxSize(5120)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Tampilkan di Katalog Publik')
                            ->default(true),
                    ]),
            ])
            ->columns(1);
    }
}
