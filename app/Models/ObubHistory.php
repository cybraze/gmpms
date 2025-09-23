<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObubHistory extends Model
{
    use HasFactory;

    protected $table = 'obub_history';
    protected $guarded = [];

    // Link to ObubData
    public function obubData()
    {
        return $this->belongsTo(ObubData::class, 'obub_id'); // foreign key in obub_history
    }
    protected $casts = [
        
        'changed_at' => 'datetime',
    ];

    // Link to user who made the change
    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}