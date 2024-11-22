<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ShipmentItem;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_name',
        'sender_city',
        'sender_address',
        'sender_phone',
        'sender_postal_code',
        'recipient_name',
        'recipient_city',
        'recipient_address',
        'recipient_phone',
        'recipient_postal_code',
        'status',
    ];

    public function items()
    {
        return $this->hasMany(ShipmentItem::class);
    }
}
