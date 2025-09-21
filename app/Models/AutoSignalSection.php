<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AutoSignalSection extends Model
{
    //
    use HasFactory;

    protected $table = 'auto_signal_section';
    protected $fillable = ['division_id', 'name'];

    // Section belongs to a Division
    public function division()
    {
    return $this->belongsTo(Division::class);
    }

    // Section has many Projects
    public function projects()
    {
    return $this->hasMany(ProjectAutoSignaling::class, 'section_id');
    }
}
