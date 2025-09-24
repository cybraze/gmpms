<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKavachItem extends Model
{
    use HasFactory;

    protected $table = 'master_kavach_item'; // table ka naam

    protected $fillable = [
        'name',
    ];
}