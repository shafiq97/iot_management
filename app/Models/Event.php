<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'install_date',
        'install_time',
        'pic_id',
        'pic_name',
        'device_id',
        'status_id',
        'location_id',
        'reading_id',
    ];
}
