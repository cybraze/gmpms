<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //
    protected $fillable = ['name', 'code'];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
