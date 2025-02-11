<?php

namespace App\Filament\Resources\AppreciationResource\Pages;

use App\Filament\Resources\AppreciationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAppreciation extends ViewRecord
{
    protected static string $resource = AppreciationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
