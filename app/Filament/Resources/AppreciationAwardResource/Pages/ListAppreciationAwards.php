<?php

namespace App\Filament\Resources\AppreciationAwardResource\Pages;

use App\Filament\Resources\AppreciationAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppreciationAwards extends ListRecords
{
    protected static string $resource = AppreciationAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
