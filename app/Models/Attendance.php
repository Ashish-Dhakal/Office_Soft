<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'leave_id',
        'date',
        'location',
        'status',
        'clock_in_time',
        'clock_out_time',
        'is_late',
        'work_hrs',
    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class , 'employee_id','id');
    }

    public function leave()
    {
        return $this->belongsTo(Leave::class);
    }

}
