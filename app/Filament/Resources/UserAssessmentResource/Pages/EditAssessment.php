<?php

namespace App\Filament\Resources\UserAssessmentResource\Pages;

use App\Filament\Resources\UserAssessmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssessment extends EditRecord
{
    protected static string $resource = UserAssessmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
