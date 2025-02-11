<?php

namespace App\Filament\Resources\AppreciationResource\Pages;

use App\Filament\Resources\AppreciationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppreciation extends EditRecord
{
    protected static string $resource = AppreciationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
