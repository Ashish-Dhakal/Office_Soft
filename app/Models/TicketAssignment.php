<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketAssignment extends Model
{
    protected $fillable = ['ticket_id','employee_id' , 'status', 'comment', 'attachment', 'assigned_at', 'completed_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

}
