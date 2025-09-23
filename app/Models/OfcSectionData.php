<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfcSectionData extends Model
{
    protected $table = 'ofc_section_data';

    protected $fillable = [
        'new_project_id',
        'section_id',
        'rkm',
        'ofc_duct_scope',
        'ofc_duct_comp',
        'ofc_lay_scope',
        'ofc_lay_comp',
        'outdoor_design_scope',
        'outdoor_design_comp',
    ];

       public function section()
{
    return $this->belongsTo(MasterKavachSection::class, 'section_id');
}

    public $timestamps = true;
}
