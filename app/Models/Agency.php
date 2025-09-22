<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    //
    protected $fillable = ['name'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
