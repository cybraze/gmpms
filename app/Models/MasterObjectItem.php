<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterObjectItem extends Model
{
    use HasFactory;

    protected $table = 'master_object_item'; // table name

    protected $fillable = [
        'object_id',
        'item_name',
        'unit',
    ];


    public function preparatoryScopes()
    {
        return $this->hasMany(PreparatoryScope::class, 'item_id');
    }

    public $timestamps = false; // kyunki abhi created_at, updated_at NULL hain
}
