<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'price',
        'offer_price',
        'start_offer',
        'end_offer',
        'amount',
        'description', 
        'active'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
