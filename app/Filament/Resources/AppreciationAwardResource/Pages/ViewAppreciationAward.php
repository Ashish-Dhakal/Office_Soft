<?php

namespace App\Filament\Resources\AppreciationAwardResource\Pages;

use App\Filament\Resources\AppreciationAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAppreciationAward extends ViewRecord
{
    protected static string $resource = AppreciationAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
