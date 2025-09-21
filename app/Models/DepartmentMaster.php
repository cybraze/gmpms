<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DepartmentMaster extends Model
{
    protected $table = 'department_master';

    protected $fillable = ['staff_dept'];

    public $timestamps = true;

    public function staff()
    {
        return $this->hasMany(StaffMaster::class, 'dept_id');
    }
}
