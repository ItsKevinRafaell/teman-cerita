<?php

namespace App\Filament\Resources\QuestionAnswerResource\Pages;

use App\Filament\Resources\QuestionAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuestionAnswer extends EditRecord
{
    protected static string $resource = QuestionAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
