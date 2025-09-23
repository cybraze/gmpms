<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionLocoKavach extends Model
{
    protected $table = 'section_loco_kavach';

    protected $fillable = [
        'new_project_id',
       'loco_shed_id',
        'allotment_kernex',
        'allotment_medha',
        'fitted_kernex',
        'fitted_medha',
        'remarks',
    ];

    public $timestamps = true;

    

  public function shed()
    {
        return $this->belongsTo(LocoShedHoldingMaster::class, 'loco_shed_id');
    }

    


}
