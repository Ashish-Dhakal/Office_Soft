<?php

namespace App\Filament\Resources\ContractTypeResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Forms\Components\TextInput;

final class ContractTypeResourceForm implements ResourceFieldContract
{

    /**
     * Get the form fields for the address resource.
     *
     * @return array<int, mixed>
     */


    public static function getFields(): array
    {
        return [
            TextInput::make('name')
            ->required()
            ->maxLength(255),
        ];
    }
}
