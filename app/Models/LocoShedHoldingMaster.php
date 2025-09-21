<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocoShedHoldingMaster extends Model
{
    protected $table = 'loco_shed_holding_master';

    protected $fillable = [
        'loco_shed',
        'loco_holding',
    ];

    public $timestamps = true;
}
