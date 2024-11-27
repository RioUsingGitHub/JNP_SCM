<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipmentLocation extends Model
{
    protected $fillable = [
        'shipment_id',
        'location_name',
        'status',
        'latitude',
        'longitude',
        'notes'
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }
}
