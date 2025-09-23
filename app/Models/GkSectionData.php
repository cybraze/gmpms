<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GkSectionData extends Model
{
    protected $table = 'gk_section_data';

    protected $fillable = [
        'new_project_id',
        'section_id',
        'rkm',
        'rfid_scope','rfid_comp',
        'se_stn_scope','se_stn_comp',
        'se_hut_scope','se_hut_comp',
        'fat_stn_scope','fat_stn_comp',
        'fat_hut_scope','fat_hut_comp',
        'sat_stn_scope','sat_stn_comp',
        'sat_hut_scope','sat_hut_comp',
        'idd_stn_scope','idd_stn_comp',
        'idd_hut_scope','idd_hut_comp',
    ];

public function section()
{
    return $this->belongsTo(MasterKavachSection::class, 'section_id');
}



    public $timestamps = true;
}


