<?php

namespace App\Filament\Resources\Families\Schemas;

use App\Models\Family;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FamilyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Kepala Keluarga')
                    ->description('Masukkan Nomor Kartu Keluarga (KK) yang valid (16 Digit) dan Nama Kepala Keluarga.')
                    ->columns(2)
                    ->components([
                        TextInput::make('kk_number')
                            ->label('Nomor Kartu Keluarga (KK)')
                            ->required()
                            ->rules(['required', 'string', 'size:16', 'regex:/^[0-9]+$/'])
                            ->unique(Family::class, 'kk_number', ignoreRecord: true)
                            ->helperText('Pastikan Nomor KK berjumlah tepat 16 digit angka dan belum pernah terdaftar.'),

                        TextInput::make('head_of_family_name')
                            ->label('Nama Kepala Keluarga')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Sesuai dengan yang tertera di dokumen fisik KK.'),
                    ]),

                Section::make('Alamat Domisili')
                    ->description('Lengkapi data alamat tempat tinggal saat ini.')
                    ->columns(2)
                    ->components([
                        Textarea::make('address')
                            ->label('Jalan / Dusun / Kampung')
                            ->required()
                            ->rows(3)
                            ->columnSpanFull(),

                        Grid::make(3)->components([
                            TextInput::make('rt')
                                ->label('RT')
                                ->required()
                                ->rules(['required', 'string', 'size:3', 'regex:/^[0-9]+$/'])
                                ->placeholder('001')
                                ->helperText('Contoh: 001'),

                            TextInput::make('rw')
                                ->label('RW')
                                ->required()
                                ->rules(['required', 'string', 'size:3', 'regex:/^[0-9]+$/'])
                                ->placeholder('002')
                                ->helperText('Contoh: 002'),

                            TextInput::make('postal_code')
                                ->label('Kode Pos')
                                ->required()
                                ->rules(['required', 'string', 'size:5', 'regex:/^[0-9]+$/'])
                                ->default('41253'),
                        ]),

                        TextInput::make('village')
                            ->label('Desa / Kelurahan')
                            ->default('Cikaum Timur')
                            ->required(),

                        TextInput::make('district')
                            ->label('Kecamatan')
                            ->default('Cikaum')
                            ->required(),

                        TextInput::make('city')
                            ->label('Kabupaten / Kota')
                            ->default('Subang')
                            ->required(),

                        TextInput::make('province')
                            ->label('Provinsi')
                            ->default('Jawa Barat')
                            ->required(),
                    ]),
            ])
            ->columns(1);
    }
}
