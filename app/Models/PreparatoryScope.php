<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparatoryScope extends Model
{
    use HasFactory;

    protected $table = 'preparatory_scope';

    protected $fillable = [
        'new_project_id',
        'item_id',
        'description',
        'scope',
        'progress',
    ];


public function project()
    {
        return $this->belongsTo(NewProject::class, 'new_project_id');
    }

    public function item()
    {
        return $this->belongsTo(MasterObjectItem::class, 'item_id');
    }

public function history()
{
    return $this->hasMany(\App\Models\PreparatoryItemHistory::class, 'scope_id', 'id');
}


}

