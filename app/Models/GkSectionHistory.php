<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GkSectionHistory extends Model
{
    protected $table = 'gk_section_history';
    protected $fillable = [
        'gk_section_id',
        'new_project_id',
        'snapshot_json',
        'changed_by',
        'changed_at'
    ];
    public function section()
{
    return $this->belongsTo(\App\Models\MasterKavachSection::class, 'section_id', 'id');
}

public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'changed_by', 'id');
}

}

