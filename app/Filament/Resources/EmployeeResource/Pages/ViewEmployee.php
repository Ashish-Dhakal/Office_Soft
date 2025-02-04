<?php

namespace App\Filament\Resources\EmployeeResource\Pages;

use App\Filament\Resources\EmployeeResource;
use Filament\Actions;
use Filament\Actions\ActionGroup;
use Filament\Resources\Pages\ViewRecord;

class ViewEmployee extends ViewRecord
{
    protected static string $resource = EmployeeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getBreadcrumb(): string
    {
        $defaultBreadcrumb = parent::getBreadcrumb(); // Get the default breadcrumb
        $employeeName = $this->record?->user->name ?? '';
    
        return trim($defaultBreadcrumb . ' > ' . $employeeName); // Append name while keeping format clean
    }
    


    
}
