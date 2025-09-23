<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KavachTenderHistory extends Model
{
    use HasFactory;

    protected $table = 'kavach_tender_history';

    protected $fillable = [
        'kavach_tender_id',
        'snapshot_json',          // e.g. status change, remark update, etc.
        'remarks',
        'changed_by',      // user_id who made the change
        'changed_at',
    ];

    // Relationships
    public function tenderData()
    {
        return $this->belongsTo(KavachTenderData::class, 'kavach_tender_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}