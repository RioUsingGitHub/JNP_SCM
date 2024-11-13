<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;

    // Add the fillable attributes
    protected $fillable = [
        'name',
        'quantity',
        'weight',
        'height',
        'width',
        'length',
        'description',
        'shipment_id', // If the shipment_id is being passed in a relationship
    ];

    // Define the relationship with Shipment
    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}

