<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoSignalingHistory extends Model
{
    protected $table = 'auto_signaling_history';

    protected $fillable = [
        'auto_signaling_id',
        'snapshot_json',
        'changed_by',
        'changed_at',
    ];

    public function autoSignaling()
    {
        return $this->belongsTo(ProjectAutoSignaling::class, 'auto_signaling_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}