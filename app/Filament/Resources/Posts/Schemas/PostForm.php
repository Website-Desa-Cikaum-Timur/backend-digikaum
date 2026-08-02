<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Post;
use App\Shared\Enums\PublicationStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('author_id')
                    ->default(auth()->id()),

                Section::make('Meta Publikasi')
                    ->description('Tentukan kategori dan status tayang berita.')
                    ->columns(2)
                    ->components([
                        Select::make('post_category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                                TextInput::make('slug')->disabled()->dehydrated()->required(),
                            ]),

                        Select::make('status')
                            ->label('Status Publikasi')
                            ->options(PublicationStatus::options())
                            ->default(PublicationStatus::Draft->value)
                            ->required(),

                        DateTimePicker::make('published_at')
                            ->label('Jadwal Tayang')
                            ->default(now())
                            ->helperText('Tanggal rilis resmi ke publik.'),

                        Toggle::make('is_highlight')
                            ->label('Jadikan Berita Utama (Highlight)')
                            ->default(false),

                        Select::make('author_id')
                            ->label('Penulis Artikel')
                            ->relationship('author', 'name')
                            ->searchable()
                            ->preload()
                            ->default(auth()->id())
                            ->required()
                            ->visible(fn () => auth()->user()->hasRole('super-admin')),
                    ]),

                Section::make('Visual Utama')
                    ->description('Unggah gambar cover (thumbnail) untuk berita ini.')
                    ->components([
                        SpatieMediaLibraryFileUpload::make('cover_image')
                            ->label('Gambar Cover')
                            ->collection('post_covers')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048)
                            ->required(),
                    ]),

                Section::make('Konten Berita')
                    ->description('Tuliskan judul dan isi berita utama desa di sini.')
                    ->components([
                        TextInput::make('title')
                            ->label('Judul Berita')
                            ->placeholder('Masukkan judul berita...')
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
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Textarea::make('excerpt')
                            ->label('Ringkasan (Excerpt)')
                            ->helperText('Muncul di halaman depan website sebagai cuplikan singkat.')
                            ->maxLength(500)
                            ->rows(3),

                        RichEditor::make('content')
                            ->label('Isi Berita Lengkap')
                            ->required()
                            ->fileAttachmentsDirectory('post_attachments'),
                    ])->columns(1),

            ])->columns(1);
    }
}
