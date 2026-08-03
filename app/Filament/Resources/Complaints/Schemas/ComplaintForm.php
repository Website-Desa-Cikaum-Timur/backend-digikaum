<?php

namespace App\Filament\Resources\Complaints\Schemas;

use App\Shared\Enums\ComplaintStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ComplaintForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Detail Laporan Warga')
                    ->description('Masukkan detail laporan. Data ini akan terkunci permanen setelah disimpan.')
                    ->columns(2)
                    ->components([
                        TextInput::make('tracking_code')
                            ->label('Nomor Resi Pelacakan')
                            ->disabled()
                            ->hiddenOn('create'),

                        TextInput::make('category')
                            ->label('Kategori Aduan')
                            ->required()
                            ->disabledOn('edit'),

                        TextInput::make('title')
                            ->label('Topik Pengaduan')
                            ->required()
                            ->disabledOn('edit')
                            ->columnSpanFull(),

                        Textarea::make('content')
                            ->label('Isi Laporan Lengkap')
                            ->required()
                            ->rows(6)
                            ->disabledOn('edit')
                            ->columnSpanFull(),

                        SpatieMediaLibraryFileUpload::make('evidence')
                            ->label('Bukti Foto Lampiran (Opsional)')
                            ->collection('complaint_evidences')
                            ->disabledOn('edit')
                            ->columnSpanFull(),
                    ]),

                Section::make('Tindakan & Informasi Pelapor')
                    ->description('Kelola status laporan dan pengaturan identitas pelapor.')
                    ->columns(2)
                    ->components([
                        Select::make('status')
                            ->label('Status Laporan Saat Ini')
                            ->options(ComplaintStatus::options())
                            ->required()
                            ->default(ComplaintStatus::Pending->value)
                            ->native(false),

                        Toggle::make('is_anonymous')
                            ->label('Sembunyikan Identitas Pelapor')
                            ->disabledOn('edit')
                            ->default(false),

                        TextInput::make('reporter_name')
                            ->label('Nama Pelapor')
                            ->required()
                            ->disabledOn('edit'),

                        TextInput::make('reporter_phone')
                            ->label('Nomor Telepon / WhatsApp')
                            ->disabledOn('edit'),
                    ]),
            ])
            ->columns(1);
    }
}
