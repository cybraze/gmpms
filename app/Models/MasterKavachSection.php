<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKavachSection extends Model
{
    protected $table = 'master_kavach_section';
    public $timestamps = false; // Because your table doesn’t have created_at/updated_at
}

