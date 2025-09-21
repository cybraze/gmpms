<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KavachTrainingSection extends Model
{
    protected $table = 'kavach_training_section';

    protected $fillable = [
        'new_project_id',
        'staff_id',
        'total_strength',
        'iriset',
        'self',
        'other',
        'remarks',
    ];

    public $timestamps = true;

   public function staff()
{
    return $this->belongsTo(\App\Models\StaffMaster::class, 'staff_id', 'id');
}
}
