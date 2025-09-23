<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TowerSectionData extends Model
{
    protected $table = 'tower_section_data';

    protected $fillable = [
         'new_project_id',
        'section_id',
        'rkm',
        'tower_foundation_stn_scope',
        'tower_foundation_stn_comp',
        'tower_erection_stn_scope',
        'tower_erection_stn_comp',
        'tower_foundation_scope',
        'tower_foundation_comp',
        'tower_erection_scope',
        'tower_erection_comp',
    ];

    public function section()
{
    return $this->belongsTo(MasterKavachSection::class, 'section_id');
}

    // timestamps (created_at, updated_at) default enable rehte hain
    public $timestamps = true;
}
