<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserAssessmentResource\Widgets\AssessmentOverview;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\FormsComponent;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Permission\Models\Role;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pengguna')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Sandi')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->multiple()
                    ->label('Peran')
                    ->relationship('roles', 'name')->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('Nama Pengguna'),
                Tables\Columns\TextColumn::make('email')
                ->label('Alamat Email'),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Peran'),
                Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                    ->dateTime(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getHeaderWidgets(): array
    {
        return [
            AssessmentOverview::class,
        ];
    }

    public static function getWidgets(): array
    {
        return [
            AssessmentOverview::class,
        ];
    }
}
