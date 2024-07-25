<?php

namespace App\Filament\Resources\QuestionAssessmentResource\Pages;

use App\Filament\Resources\QuestionAssessmentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestionAssessment extends EditRecord
{
    protected static string $resource = QuestionAssessmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
