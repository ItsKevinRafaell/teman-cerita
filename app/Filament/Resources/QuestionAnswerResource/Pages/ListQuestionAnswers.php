<?php

namespace App\Filament\Resources\QuestionAnswerResource\Pages;

use App\Filament\Resources\QuestionAnswerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestionAnswers extends ListRecords
{
    protected static string $resource = QuestionAnswerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
