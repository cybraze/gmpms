<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanHead extends Model
{
    //
    protected $fillable = ['code', 'description'];

    public function projects()
    {
        return $this->hasMany(Project::class, 'ph_id');
    }
}
