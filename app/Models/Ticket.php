<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['client_id','title', 'description', 'status' , 'priority', 'image', 'attachment'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'ticket_category_id');
    }

    public function assignments()
    {
        return $this->hasMany(TicketAssignment::class);
    }

    
}
