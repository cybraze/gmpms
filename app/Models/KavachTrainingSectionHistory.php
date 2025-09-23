<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KavachTrainingSectionHistory extends Model
{
    protected $table = 'kavach_training_section_history';
    protected $fillable = [
        'training_section_id','new_project_id','staff_id',
        'snapshot_json','changed_by','changed_at'
    ];

    public function staff()
    {
        return $this->belongsTo(StaffMaster::class, 'staff_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

    
}

