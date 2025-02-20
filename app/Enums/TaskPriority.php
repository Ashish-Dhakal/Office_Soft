<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TaskPriority: string implements HasColor, HasLabel ,HasIcon
{

        // $table->enum('task_priority', ['low', 'medium', 'high'])->default('medium')->nullable();

    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::LOW => 'success',
            self::MEDIUM => 'info',
            self::HIGH => 'danger',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::LOW => 'Low',
            self::MEDIUM => 'Medium',
            self::HIGH => 'High',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::LOW => 'heroicon-m-check-circle',
            self::MEDIUM => 'heroicon-m-check-circle',
            self::HIGH => 'heroicon-m-check-circle',
        };
    }
}
