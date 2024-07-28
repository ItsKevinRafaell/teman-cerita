<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionAnswerResource\Pages;
use App\Filament\Resources\QuestionAnswerResource\RelationManagers;
use App\Models\QuestionAnswer;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionAnswerResource extends Resource
{
    protected static ?string $model = QuestionAnswer::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Assessment Management';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('answer_number')
                    ->required()
                    ->numeric(),
                TextInput::make('content')
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('answer_option'),
                TextColumn::make('answer_option_description'),
                TextColumn::make('answer_number'),
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
            'index' => Pages\ListQuestionAnswers::route('/'),
            'create' => Pages\CreateQuestionAnswer::route('/create'),
            'edit' => Pages\EditQuestionAnswer::route('/{record}/edit'),
        ];
    }
}
