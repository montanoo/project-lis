<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nit',
        'address',
        'phone',
        'user_id',
        'active',
        'tax'
    ];

    public function hasUser(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coupons() {
        return $this->hasMany(Coupon::class, 'company_id');
    }

    public function purchases() {
        return $this->hasMany(Purchases::class, 'company_id');
    }
}
