<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'station_id', 'ph_id', 'agency_id', 'work_type',
        'tender_status', 'esp_status', 'sip_status', 'crs_status',
        'crs_sanction_date', 'building_status', 'building_tdc',
        'indoor_progress_pct', 'outdoor_progress_pct', 'tds_target',
        'remarks', 'created_by', 'updated_by'
    ];

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function planHead()
    {
        return $this->belongsTo(PlanHead::class, 'ph_id');
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
    public function histories()
    {
        return $this->hasMany(ProjectHistory::class);
    }
    protected static function booted()
    {
    // When a project is created
    static::created(function ($project) {
        ProjectHistory::create([
            'project_id'   => $project->id,                // link history to this project
            'snapshot_json'=> json_encode($project->toArray()), // save full project snapshot as JSON
            'changed_by'   => auth()->id(),                // which user made the change
            'changed_at'   => now(),                       // when the change happened
        ]);
    });

    // When a project is updated
    static::updated(function ($project) {
        ProjectHistory::create([
            'project_id'   => $project->id,
            'snapshot_json'=> json_encode($project->toArray()),
            'changed_by'   => auth()->id(),
            'changed_at'   => now(),
        ]);
    });
    }
}
