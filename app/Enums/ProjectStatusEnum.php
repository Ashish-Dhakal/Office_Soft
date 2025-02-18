<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ProjectStatusEnum: string implements HasColor, HasLabel , HasIcon
{
      
    case PLANNED = 'planned';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case ON_HOLD = 'on_hold';
    case CANCELLED = 'cancelled';

    public function getLabel(): string
    {
        return match ($this) {
            self::PLANNED => 'planned',
            self::IN_PROGRESS => 'in_progress',
            self::COMPLETED => 'completed',
            self::ON_HOLD => 'on_hold',
            self::CANCELLED => 'cancelled',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PLANNED => 'info',
            self::IN_PROGRESS => 'ternary',
            self::COMPLETED => 'success',
            self::ON_HOLD => 'warning',
            self::CANCELLED => 'danger',
        };
    }
    public function getIcon(): ?string
    {
        return match ($this) {
            self::PLANNED => __('heroicon-m-calendar'),
            self::IN_PROGRESS => __('heroicon-m-calendar'),
            self::COMPLETED => __('heroicon-m-calendar'),
            self::ON_HOLD => __('heroicon-m-calendar'),
            self::CANCELLED => __('heroicon-m-calendar'),
        };
    }
}
