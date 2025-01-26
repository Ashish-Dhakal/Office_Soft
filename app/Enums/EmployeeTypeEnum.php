<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum EmployeeTypeEnum : string implements HasColor, HasLabel
{

        // $table->enum('employee_type',['full_time', 'part_time' , 'contractor' ,'internship' ,'freelancer']);

    case FULL_TIME = 'full_time';
    case PART_TIME = 'part_time';
    case CONTRACTOR = 'contractor';
    case INTERNSHIP = 'internship';
    case FREELANCER = 'freelancer';

    public function getLabel(): string
    {
        return match ($this) {
            self::FULL_TIME => 'Full Time',
            self::PART_TIME => 'Part Time',
            self::CONTRACTOR => 'Contractor',
            self::INTERNSHIP => 'Internship',
            self::FREELANCER => 'Freelancer',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FULL_TIME => 'success',
            self::PART_TIME => 'info',
            self::CONTRACTOR => 'ternary',
            self::INTERNSHIP => 'warning',
            self::FREELANCER => 'danger',
        };
    }
}
