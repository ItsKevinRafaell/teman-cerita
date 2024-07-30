<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Articles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Heading')
                    ->tabs([
                        Tab::make('Deskripsi Artikel')
                            ->columnSpanFull()
                            ->schema([
                                FileUpload::make('thumbnail')
                                    ->image()
                                    ->directory('article-thumbnails')->label('Gambar'),
                                TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)->label('Judul'),
                                Select::make('category_id')
                                    ->relationship('category', 'name')
                                    ->required()->label('Pilih Kategori'),
                                Toggle::make('is_choosen')->label('Terpilih'),
                                Hidden::make('author_id')
                                    ->default(auth()->id()),
                            ]),
                        Tab::make('Konten Artikel')
                            ->columnSpanFull()
                            ->schema([
                                RichEditor::make('content')
                                    ->columnSpanFull()
                                    ->required()
                                    ->label('Konten')
                                    ->toolbarButtons([
                                        'attachFiles',
                                        'blockquote',
                                        'bold',
                                        'bulletList',
                                        'codeBlock',
                                        'h2',
                                        'h3',
                                        'italic',
                                        'link',
                                        'orderedList',
                                        'redo',
                                        'strike',
                                        'underline',
                                        'undo',
                                    ])
                            ]),
                    ])
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul'),
                Tables\Columns\TextColumn::make('author.name')->label('Nama Penulis'),
                Tables\Columns\ImageColumn::make('thumbnail')->label('Gambar'),
                Tables\Columns\TextColumn::make('category.name')->label('Nama Kategori'),
                Tables\Columns\TextColumn::make('is_choosen')
                    ->label('Terpilih'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->since()->label('Dibuat'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make()->label('Hapus'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
