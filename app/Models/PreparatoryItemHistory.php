<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparatoryItemHistory extends Model
{
    use HasFactory;

    protected $table = 'preparatory_item_history';

    protected $fillable = [
        'scope_id',
        'scope',
        'progress',
    ];
}
