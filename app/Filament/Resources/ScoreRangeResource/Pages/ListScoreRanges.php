<?php

namespace App\Filament\Resources\ScoreRangeResource\Pages;

use App\Filament\Resources\ScoreRangeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListScoreRanges extends ListRecords
{
    protected static string $resource = ScoreRangeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
