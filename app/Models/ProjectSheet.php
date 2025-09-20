<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSheet extends Model
{
    use HasFactory;

    protected $table = 'project_sheet'; // kyunki tumne singular naam rakha hai

    protected $fillable = [
        'project_type_id',
        'sheet_name',
    ];

    // relation with ProjectType
    public function projectType()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
}

