<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['user_id' ,'client_type' , 'company_name' , 'website' , 'tax_name' , 'tax_number' , 'pan-vat_number' , 'company_address' , 'shipping_address' , 'postal_code' , 'notes' ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
