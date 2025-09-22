<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObubMajorSection extends Model
{
    protected $table = 'obub_major_sections';
    public $timestamps = false;

    protected $fillable = ['name'];

    public function data() { return $this->hasMany(ObubData::class, 'major_section_id'); }
}

