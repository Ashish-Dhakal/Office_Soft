<?php

namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserRoles : string implements HasColor, HasLabel , HasIcon
{
    case ADMIN = 'admin';
    case CLIENT = 'client';
    case EMPLOYEE = 'employee';

    public function getLabel(): string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::CLIENT => 'client',
            self::EMPLOYEE => 'employee',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ADMIN => 'success',
            self::CLIENT => 'warning',
            self::EMPLOYEE => 'info'
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ADMIN => __('heroicon-m-shield-check'),
            self::CLIENT => __('heroicon-m-user-group'),
            self::EMPLOYEE => __('heroicon-m-user-circle'),
        };
    }
}
