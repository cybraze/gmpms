<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Division extends Model
{

    protected $fillable = ['name'];

    // One Division has many Sections
    public function sections()
    {
    return $this->hasMany(AutoSignalSection::class);
    }

    // One Division has many Projects
    public function projects()
    {
    return $this->hasMany(ProjectAutoSignaling::class);
    }
}
