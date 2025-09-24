<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiData extends Model
{
    use HasFactory;

    protected $table = 'ni_data';

    protected $fillable = [
        'division_id',
        'project_name',
        'station_id',
        'agency_id',
        'section_id',
        'length_of_section_in_km',
        'proposed_ni_month',
        'for_pre_ni_from',
        'for_pre_ni_to',
        'for_ni_from',
        'for_ni_to',
        'crs_inspection_date',
        'is_commisioned',
        'remarks',
        'esp_status',
        'sip_status',
        'crs_application_status',
        'crs_tdc',
        'crs_sanction_status',
        'month_number',
        'ni_status',
    ];

    // Relationships
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
    public function histories()
    {
        return $this->hasMany(NiHistory::class, 'ni_data_id');
    }

    public function section()
    {
        return $this->belongsTo(AutoSignalSection::class, 'section_id');
    }
}