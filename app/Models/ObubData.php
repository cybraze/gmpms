<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObubData extends Model
{
    protected $table = 'obub_data';

    // Map Laravel timestamps to your columns
    const CREATED_AT = 'created_on';
    const UPDATED_AT = 'updated_on';

    protected $fillable = [
        'div_id','lc_no','local_name','state_id','dist_id','tvu_date','block_sec_km',
        'major_section_id','exe_agency_id','engg_officer','sanc_details',
        'work_type','gad_app','est_sanct','sanc_cost','award_tender','sanc_cost_sharing',
        'land_acqu','phy_prog','finan_prog','gqgd','pmo','lc_location',
        'target','tdc','tdc_fy','brief_remarks','target_rob','target_rub',
        'completion_date','lc_elim_date','created_by','created_on','updated_on'
    ];

    protected $casts = [
        'completion_date' => 'date',
        'lc_elim_date'    => 'date',
        'created_on'      => 'datetime',
        'updated_on'      => 'datetime',
    ];
    public function histories()
    {
    return $this->hasMany(ObubHistory::class, 'obub_id');
    }
    protected static function booted()
    {
    static::created(function ($record) {
    ObubHistory::create([
        'obub_id' => $record->id,
        'snapshot_json' => json_encode($record->toArray()),
        'changed_by' => auth()->id(),
        'changed_at' => now(),
    ]);
    });

    static::updated(function ($record) {
    ObubHistory::create([
        'obub_id' => $record->id,
        'snapshot_json' => json_encode($record->toArray()),
        'changed_by' => auth()->id(),
        'changed_at' => now(),
    ]);
    });
    }

    public function state()        { return $this->belongsTo(ObubState::class, 'state_id'); }
    public function district()     { return $this->belongsTo(ObubDistrict::class, 'dist_id'); }
    public function majorSection() { return $this->belongsTo(ObubMajorSection::class, 'major_section_id'); }
    public function agency()       { return $this->belongsTo(\App\Models\Agency::class, 'exe_agency_id'); } // existing table/model
    public function creator()      { return $this->belongsTo(\App\Models\User::class, 'created_by'); }      // if you have users
}
