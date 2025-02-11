<?php

namespace App\Filament\Resources\AppreciationAwardResource\Pages;

use App\Filament\Resources\AppreciationAwardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAppreciationAward extends EditRecord
{
    protected static string $resource = AppreciationAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
