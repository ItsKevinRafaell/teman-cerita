<?php

namespace App\Filament\Resources\QuestionnaireTypeResource\Pages;

use App\Filament\Resources\QuestionnaireTypeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuestionnaireTypes extends ListRecords
{
    protected static string $resource = QuestionnaireTypeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
