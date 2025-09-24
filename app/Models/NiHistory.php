<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NiHistory extends Model
{
    use HasFactory;

    protected $table = 'ni_histories';

    protected $fillable = [
        'ni_data_id',
        'snapshot',
        'changed_by',
        'changed_at',
    ];

    protected $casts = [
        'snapshot'   => 'array',
        'changed_at' => 'datetime',
    ];

    /**
     * Relation to NiData
     */
    public function niData()
    {
        return $this->belongsTo(NiData::class, 'ni_data_id');
    }

    /**
     * Relation to User (who made the change)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}