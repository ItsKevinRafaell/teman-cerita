<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScoreRangeResource\Pages;
use App\Filament\Resources\ScoreRangeResource\RelationManagers;
use App\Models\ScoreRange;
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

class ScoreRangeResource extends Resource
{
    protected static ?string $model = ScoreRange::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';   
    protected static ?string $navigationGroup = 'Assessment Management';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('questionnaire_type_id')
                ->relationship('questionnaireType', 'name')->preload(),
                TextInput::make('interpretation')
                ->required(),
                TextInput::make('interpretation_description')
                ->required(),
                TextInput::make('min_score')
                ->numeric()
                ->required(),
                TextInput::make('max_score')
                ->numeric()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('questionnaireType.name'),
                TextColumn::make('interpretation'),
                TextColumn::make('interpretation_description'),
                TextColumn::make('min_score'),
                TextColumn::make('max_score'),
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
            'index' => Pages\ListScoreRanges::route('/'),
            'create' => Pages\CreateScoreRange::route('/create'),
            'edit' => Pages\EditScoreRange::route('/{record}/edit'),
        ];
    }    
}
