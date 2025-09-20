<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProject extends Model
{
    use HasFactory;

    protected $table = 'new_project'; // kyunki tumne singular table banaya hai

    protected $fillable = [
        'project_type_id',
        'project_name',
    ];

    public $timestamps = true;

    public function projectType()
{
    return $this->belongsTo(ProjectType::class, 'project_type_id');
}

public function preparatoryScopes()
    {
        return $this->hasMany(PreparatoryScope::class, 'new_project_id');
    }

}
