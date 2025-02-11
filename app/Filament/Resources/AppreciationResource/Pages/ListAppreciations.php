<?php

namespace App\Filament\Resources\AppreciationResource\Pages;

use App\Filament\Resources\AppreciationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAppreciations extends ListRecords
{
    protected static string $resource = AppreciationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
