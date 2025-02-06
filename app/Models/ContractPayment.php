<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractPayment extends Model
{
    protected $fillable = [
        'contract_id',
        'amount',
        'payment_date',
        'status',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}