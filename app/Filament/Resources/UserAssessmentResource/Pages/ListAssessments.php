<?php

namespace App\Filament\Resources\UserAssessmentResource\Pages;

use App\Filament\Resources\UserAssessmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssessments extends ListRecords
{
    protected static string $resource = UserAssessmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
