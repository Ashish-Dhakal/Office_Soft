<?php

namespace App\Models;

use App\Enums\EmployeeTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $fillable = ['date', 'title', 'description'];

    public function casts(): array
    {
        return[
            'date' => 'date'
        ];
    }
}
