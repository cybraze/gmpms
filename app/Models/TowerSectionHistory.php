<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TowerSectionHistory extends Model
{
    use HasFactory;

    protected $table = 'tower_section_history';
    protected $fillable = [
        'tower_section_id',
        'new_project_id',
        'section_id',
        'snapshot_json',
        'changed_by',
        'changed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }

    public function section()
    {
        return $this->belongsTo(MasterKavachSection::class, 'section_id');
    }
}

