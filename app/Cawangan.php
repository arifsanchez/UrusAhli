<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cawangan extends Model
{
    use SoftDeletes;

    public $table = 'cawangans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nama',
        'created_at',
        'updated_at',
        'deleted_at',
        'bahagian_id',
    ];

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'bahagian_id');
    }
}
