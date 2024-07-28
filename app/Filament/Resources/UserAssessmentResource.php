<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserAssessmentResource\Pages;
use App\Filament\Resources\UserAssessmentResource\RelationManagers;
use App\Filament\Resources\UserAssessmentResource\Widgets\AssessmentOverview;
use App\Models\UserAssessment;
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

class UserAssessmentResource extends Resource
{
    protected static ?string $model = UserAssessment::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-check';
    protected static ?string $navigationGroup = 'Assessment Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                ->required()
                ->relationship('user', 'name'),
                Select::make('questionnaire_type_id')
                ->required()
                ->relationship('questionnaireType', 'name'),
                TextInput::make('score')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name'),
                TextColumn::make('questionnaireType.name'),
                TextColumn::make('score'),
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
            'index' => Pages\ListAssessments::route('/'),
            'create' => Pages\CreateAssessment::route('/create'),
            'edit' => Pages\EditAssessment::route('/{record}/edit'),
        ];
    }    

    public static function getHeaderWidgets(): array
    {
        return [
            AssessmentOverview::class,
        ];
    }
}
