<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectTimer extends Model
{
    protected $fillable = ['date', 'task_id', 'start_time', 'end_time', 'duration'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
