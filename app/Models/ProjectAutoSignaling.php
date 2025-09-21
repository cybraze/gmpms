<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAutoSignaling extends Model
{
    //
      use HasFactory;

    protected $table = 'project_auto_signaling';

    protected $fillable = [
        'division_id',
        'section_id',
        'target_rkm',
        'completed_rkm',
        'balance_rkm',
        'target_year',
        'esp_status',
        'sip_status',
        'rcc_status',
        'swr_status',
        'interface_status',
        'app_logic_status',
        'fat_status',
        'sat_status',
        'tender_status',
        'indoor_progress_pct',
        'outdoor_progress_pct',
        'gm_sanction_status',
        'tdc_target',
    ];

    // Automatically calculate balance_rkm
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->balance_rkm = max(0, $model->target_rkm - $model->completed_rkm);
        });
    }

    // Relationships
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function section()
    {
        return $this->belongsTo(AutoSignalSection::class, 'section_id');
    }

    // Progress percentage helper
    public function getOverallProgressAttribute()
    {
        if ($this->target_rkm == 0) return 0;
        return round(($this->completed_rkm / $this->target_rkm) * 100, 2);
    }

    // Status helpers
    public function isApproved($statusField)
    {
        return $this->$statusField == 1;
    }

    public function approveStatus($statusField)
    {
        $this->$statusField = 1;
        $this->save();
    }

    public function resetStatus($statusField)
    {
        $this->$statusField = 0;
        $this->save();
    }
}
