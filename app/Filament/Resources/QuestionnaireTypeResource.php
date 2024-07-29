<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionnaireTypeResource\Pages;
use App\Filament\Resources\QuestionnaireTypeResource\RelationManagers;
use App\Models\QuestionnaireType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionnaireTypeResource extends Resource
{
    protected static ?string $model = QuestionnaireType::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-check';
    protected static ?string $navigationGroup = 'Assessment Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama'),
                TextColumn::make('description')
                    ->label('Deskripsi'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListQuestionnaireTypes::route('/'),
            'create' => Pages\CreateQuestionnaireType::route('/create'),
            'edit' => Pages\EditQuestionnaireType::route('/{record}/edit'),
        ];
    }
}
