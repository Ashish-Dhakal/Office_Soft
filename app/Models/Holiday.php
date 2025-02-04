<?php

namespace App\Models;

use App\Enums\EmployeeTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['date', 'title', 'description','department_id' , 'employee_type'];

    public function casts(): array
    {
        return[
            'date' => 'date',
            'employee_type' => EmployeeTypeEnum::class
        ];
    }
}
