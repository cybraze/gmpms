<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMaster extends Model
{
    protected $table = 'staff_master';

    protected $fillable = ['dept_id', 'designation'];

    public $timestamps = true;

    public function department()
    {
        return $this->belongsTo(DepartmentMaster::class, 'dept_id');
    }
}
