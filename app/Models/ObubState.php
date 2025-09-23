<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObubState extends Model
{
    protected $table = 'obub_states';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function districts() { return $this->hasMany(ObubDistrict::class, 'state_id'); }
    public function data()      { return $this->hasMany(ObubData::class, 'state_id'); }
}

