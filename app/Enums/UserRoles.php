<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum UserRoles: string implements HasColor, HasLabel, HasIcon
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case CLIENT = 'client';
    case EMPLOYEE = 'employee';

    public function getLabel(): string
    {
        return match ($this) {
            self::SUPER_ADMIN => 'super admin',
            self::ADMIN => 'admin',
            self::CLIENT => 'client',
            self::EMPLOYEE => 'employee',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::SUPER_ADMIN => 'primary',
            self::ADMIN => 'success',
            self::CLIENT => 'warning',
            self::EMPLOYEE => 'info'
        };
    }

    public function is(int|string $value): bool
    {
        return $this->value === $value;
    }

    // public static function getValues(): array
    // {
    //     return array_map(fn($case) => $case->value, self::cases());
    // }
    public function getIcon(): ?string
    {
        return match ($this) {
            self::SUPER_ADMIN => __('heroicon-m-shield-check'),
            self::ADMIN => __('heroicon-m-shield-check'),
            self::CLIENT => __('heroicon-m-user-group'),
            self::EMPLOYEE => __('heroicon-m-user-circle'),
        };
    }
}
