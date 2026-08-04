<?php

namespace App\Filament\Resources\Locations\Schemas;

use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Http;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Titik Lokasi')
                    ->description('Lengkapi data profil bangunan atau area.')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Lokasi / Tempat')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Select::make('category')
                            ->label('Kategori Pemetaan')
                            ->options([
                                'kantor_desa' => 'Kantor & Layanan Desa',
                                'umkm' => 'UMKM & Bisnis',
                                'fasilitas_kesehatan' => 'Fasilitas Kesehatan',
                                'fasilitas_pendidikan' => 'Fasilitas Pendidikan',
                                'ibadah' => 'Tempat Ibadah',
                                'rawan_bencana' => 'Titik Rawan Bencana',
                            ])
                            ->required()
                            ->native(false),

                        TextInput::make('slug')
                            ->label('URL Slug')
                            ->disabled()
                            ->hiddenOn('create'),

                        Textarea::make('address')
                            ->label('Alamat Lengkap')
                            ->rows(3)
                            ->columnSpanFull(),

                        Textarea::make('description')
                            ->label('Deskripsi Lokasi')
                            ->rows(4)
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('photo')
                            ->label('Foto Lokasi')
                            ->collection('location_photos')
                            ->image()
                            ->imageEditor()
                            ->columnSpanFull(),
                    ]),

                Section::make('Sistem Koordinat Geografis')
                    ->description('Cari lokasi, atau klik/geser pin merah pada peta untuk menentukan titik koordinat secara presisi.')
                    ->columns(2)
                    ->components([

                        TextInput::make('search_address')
                            ->label('Cari Titik Lokasi Secara Otomatis')
                            ->placeholder('Ketik nama desa / jalan / kota...')
                            ->helperText('Ketik dan tunggu 1 detik. Peta akan otomatis bergeser. Contoh: Cikaum Timur, Subang')
                            ->columnSpanFull()
                            ->dehydrated(false)
                            ->suffixIcon('heroicon-m-magnifying-glass')
                            ->live(debounce: 1000)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $state) {
                                if (empty($state)) {
                                    return;
                                }

                                $response = Http::withHeaders([
                                    'User-Agent' => 'Digikaum-CikaumTimur/1.0',
                                ])->get('https://nominatim.openstreetmap.org/search', [
                                    'format' => 'json',
                                    'q' => $state,
                                    'limit' => 1,
                                ]);

                                $data = $response->json();

                                if (! empty($data) && isset($data[0])) {
                                    $lat = (float) $data[0]['lat'];
                                    $lon = (float) $data[0]['lon'];

                                    $set('location_map', ['lat' => $lat, 'lng' => $lon]);
                                    $set('latitude', $lat);
                                    $set('longitude', $lon);

                                    Notification::make()
                                        ->title('Lokasi Ditemukan!')
                                        ->body('Peta berhasil digeser ke: ' . current(explode(',', $data[0]['display_name'])))
                                        ->success()
                                        ->send();
                                } else {
                                    Notification::make()
                                        ->title('Lokasi Tidak Ditemukan')
                                        ->body('Coba gunakan kata kunci pencarian yang lebih spesifik.')
                                        ->danger()
                                        ->send();
                                }
                            }),

                        Map::make('location_map')
                            ->label('Peta Interaktif')
                            ->columnSpanFull()
                            ->defaultLocation(latitude: -6.4123, longitude: 107.6123)
                            ->afterStateUpdated(function (Set $set, ?array $state): void {
                                if ($state) {
                                    $set('latitude', $state['lat']);
                                    $set('longitude', $state['lng']);
                                }
                            })
                            ->afterStateHydrated(function (Set $set, Get $get): void {
                                if ($get('latitude') && $get('longitude')) {
                                    $set('location_map', ['lat' => $get('latitude'), 'lng' => $get('longitude')]);
                                }
                            })
                            ->live(onBlur: true)
                            ->showMarker()
                            ->markerColor('#ef4444')
                            ->showFullscreenControl()
                            ->showZoomControl()
                            ->draggable(true)
                            ->clickable(true)
                            ->dehydrated(false),

                        TextInput::make('latitude')
                            ->label('Latitude (Garis Lintang)')
                            ->numeric()
                            ->required()
                            ->readOnly()
                            ->helperText('Otomatis berubah mengikuti pin peta.'),

                        TextInput::make('longitude')
                            ->label('Longitude (Garis Bujur)')
                            ->numeric()
                            ->required()
                            ->readOnly()
                            ->helperText('Otomatis berubah mengikuti pin peta.'),

                        Toggle::make('is_active')
                            ->label('Tampilkan di Peta Publik')
                            ->default(true)
                            ->columnSpanFull(),
                    ]),
            ])
            ->columns(1);
    }
}
