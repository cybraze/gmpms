<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocoKavachSectionHistory extends Model
{
    use HasFactory;

    protected $table = 'loco_kavach_section_history';

    protected $fillable = [
        'loco_section_id',
        'new_project_id',
        'loco_shed_id',
        'snapshot_json',
        'changed_by',
        'changed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

    public function shed()
    {
        return $this->belongsTo(LocoShedHoldingMaster::class, 'loco_shed_id');
    }




}

