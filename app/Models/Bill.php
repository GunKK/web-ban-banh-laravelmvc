<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_amount',
        'payment_method',
        'status',
        'payment_status',
        'user_id',
        'receiver',
        'address_receiver',
        'phone_receiver',
        'note',
    ];

    public function billItems()
    {
        return $this->hasMany(BillItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
