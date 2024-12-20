<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'shipment_id',
        'name',
        'quantity',
        'weight',
        'length',
        'width',
        'height',
        'description',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }



}
