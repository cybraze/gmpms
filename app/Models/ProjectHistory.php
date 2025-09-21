<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectHistory extends Model
{
    //
    protected $table = 'project_history'; // since it’s not plural

    protected $fillable = [
        'project_id',
        'snapshot_json',
        'changed_by',
        'changed_at',
    ];
    protected $casts = [
    'changed_at' => 'datetime',
    ];
    public function project()
    {
    return $this->belongsTo(Project::class);
    }

    public function user()
    {
    return $this->belongsTo(User::class, 'changed_by');
    }
}
