<?php

namespace App\Filament\Resources\UserResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class UserResourceForm implements ResourceFieldContract
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
        TextInput::make('email')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique(ignoreRecord: true),
        Select::make('role')
            ->options([
                'client' => 'Client',
                'employee' => 'Employee',
                'admin' => 'Admin',
            ])
            ->required()
            ->label('Role')
            ->placeholder('Select a role'),
        TextInput::make('password')
            ->password()
            ->required(fn($context) => $context === 'create')
            ->maxLength(255),
        ];
    }
}