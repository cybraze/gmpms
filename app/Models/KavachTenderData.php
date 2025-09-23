<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KavachTenderData extends Model
{
    use HasFactory;

    protected $table = 'kavach_tender_data';

    protected $fillable = [
        'kavach_item_id',
        'kavach_section_id',
        'new_project_id',
        'tender_status',
        'nit_date',
        'tender_opening_date',
        'loa_date',
        'remarks',
        'updated_on',
    ];

    // Relationships
    public function item()
    {
        return $this->belongsTo(MasterKavachItem::class, 'kavach_item_id');
    }

    public function section()
    {
        return $this->belongsTo(MasterKavachSection::class, 'kavach_section_id');
    }

    public function project()
    {
        return $this->belongsTo(NewProject::class, 'new_project_id');
    }

    public function histories()
    {
        return $this->hasMany(KavachTenderHistory::class, 'kavach_tender_id');
    }
}