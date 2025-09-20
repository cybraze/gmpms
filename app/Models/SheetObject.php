<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SheetObject extends Model
{
    use HasFactory;

    protected $table = 'sheet_object'; // table name

    protected $fillable = [
        'project_type_id',
        'object_name',
    ];

    public $timestamps = false; // kyunki created_at, updated_at abhi NULL aa rahe the
}
