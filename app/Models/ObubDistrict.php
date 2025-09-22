<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObubDistrict extends Model
{
    protected $table = 'obub_districts';
    public $timestamps = false;

    protected $fillable = ['name', 'state_id'];

    public function state() { return $this->belongsTo(ObubState::class, 'state_id'); }
    public function data()  { return $this->hasMany(ObubData::class, 'dist_id'); }
}
