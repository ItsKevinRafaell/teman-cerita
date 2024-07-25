<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionAssessmentResource\Pages;
use App\Filament\Resources\QuestionAssessmentResource\RelationManagers;
use App\Models\QuestionAssessment;
use App\Models\QuestionAssessments;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionAssessmentResource extends Resource
{
    protected static ?string $model = QuestionAssessments::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
       return $form
            ->schema([
                Select::make('questionnaire_type_id')
                ->relationship('questionnaireType', 'name')->preload(),
                TextInput::make('content')
                ->required()
                ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('questionnaireType.name'),
                TextColumn::make('content'),
                TextColumn::make('created_at')
                    ->dateTime()->since(),
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
            'index' => Pages\ListQuestionAssessments::route('/'),
            'create' => Pages\CreateQuestionAssessment::route('/create'),
            'edit' => Pages\EditQuestionAssessment::route('/{record}/edit'),
        ];
    }    
}
