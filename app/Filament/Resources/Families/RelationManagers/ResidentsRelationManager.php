<?php

namespace App\Filament\Resources\Families\RelationManagers;

use App\Models\Resident;
use App\Shared\Enums\FamilyRelation;
use App\Shared\Enums\GenderType;
use Carbon\Carbon;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResidentsRelationManager extends RelationManager
{
    protected static string $relationship = 'residents';

    protected static ?string $title = 'Daftar Anggota Keluarga';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Identitas Pribadi')
                    ->description('Masukkan data kependudukan sesuai dengan KTP/KIA.')
                    ->columns(2)
                    ->components([
                        TextInput::make('nik')
                            ->label('Nomor Induk Kependudukan (NIK)')
                            ->required()
                            ->rules(['required', 'string', 'size:16', 'regex:/^[0-9]+$/'])
                            ->unique(Resident::class, 'nik', ignoreRecord: true)
                            ->helperText('Wajib 16 digit angka unik.'),

                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        Grid::make(2)->components([
                            TextInput::make('place_of_birth')
                                ->label('Tempat Lahir')
                                ->required()
                                ->maxLength(255),

                            DatePicker::make('date_of_birth')
                                ->label('Tanggal Lahir')
                                ->required()
                                ->displayFormat('d F Y')
                                ->native(false),
                        ]),

                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options(GenderType::options())
                            ->required()
                            ->native(false),

                        Select::make('family_relation_status')
                            ->label('Status Hubungan dalam Keluarga')
                            ->options(FamilyRelation::options())
                            ->required()
                            ->searchable(),
                    ]),

                Section::make('Informasi Tambahan')
                    ->columns(2)
                    ->collapsed()
                    ->components([
                        Select::make('religion')
                            ->label('Agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen Protestan',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Buddha' => 'Buddha',
                                'Konghucu' => 'Konghucu',
                            ])
                            ->required()
                            ->native(false),

                        Select::make('education_level')
                            ->label('Pendidikan Terakhir')
                            ->options([
                                'Tidak/Belum Sekolah' => 'Tidak/Belum Sekolah',
                                'Belum Tamat SD/Sederajat' => 'Belum Tamat SD/Sederajat',
                                'Tamat SD/Sederajat' => 'Tamat SD/Sederajat',
                                'SLTP/Sederajat' => 'SLTP/Sederajat',
                                'SLTA/Sederajat' => 'SLTA/Sederajat',
                                'Diploma I/II' => 'Diploma I/II',
                                'Akademi/Diploma III/S.Muda' => 'Akademi/Diploma III/S.Muda',
                                'Diploma IV/Strata I' => 'Diploma IV/Strata I',
                                'Strata II' => 'Strata II',
                                'Strata III' => 'Strata III',
                            ])
                            ->required()
                            ->searchable(),

                        TextInput::make('profession')
                            ->label('Pekerjaan')
                            ->required()
                            ->maxLength(255),

                        Select::make('marital_status')
                            ->label('Status Perkawinan')
                            ->options([
                                'Belum Kawin' => 'Belum Kawin',
                                'Kawin' => 'Kawin',
                                'Cerai Hidup' => 'Cerai Hidup',
                                'Cerai Mati' => 'Cerai Mati',
                            ])
                            ->required()
                            ->native(false),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Penduduk')
                    ->searchable(),

                Tables\Columns\TextColumn::make('family_relation_status')
                    ->label('Hubungan')
                    ->badge(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('L/P'),

                Tables\Columns\TextColumn::make('date_of_birth')
                    ->label('Usia')
                    ->formatStateUsing(fn ($state) => Carbon::parse($state)->age . ' Thn'),
            ])
            ->filters([
                TrashedFilter::make()
                    ->label('Data Terhapus (Sampah)'),
            ])
            ->headerActions([
                CreateAction::make()->label('Tambah Anggota Keluarga'),
            ])
            ->actions([
                EditAction::make()->label('Ubah'),
                DeleteAction::make()->label('Hapus Sementara'),
                ForceDeleteAction::make()->label('Hapus Permanen'),
                RestoreAction::make()->label('Kembalikan'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
