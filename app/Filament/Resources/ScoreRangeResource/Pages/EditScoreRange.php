<?php

namespace App\Filament\Resources\ScoreRangeResource\Pages;

use App\Filament\Resources\ScoreRangeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditScoreRange extends EditRecord
{
    protected static string $resource = ScoreRangeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
