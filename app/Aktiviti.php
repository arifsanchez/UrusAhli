<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aktiviti extends Model
{
    use SoftDeletes;

    public $table = 'aktivitis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'tarikh_mula',
        'tarikh_akhir',
    ];

    protected $fillable = [
        'nama',
        'aturcara',
        'created_at',
        'updated_at',
        'deleted_at',
        'bahagian_id',
        'tarikh_mula',
        'tarikh_akhir',
        'jemputan_oleh_id',
    ];

    public function bahagian()
    {
        return $this->belongsTo(Bahagian::class, 'bahagian_id');
    }

    public function jemputan_oleh()
    {
        return $this->belongsTo(User::class, 'jemputan_oleh_id');
    }

    public function getTarikhMulaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTarikhMulaAttribute($value)
    {
        $this->attributes['tarikh_mula'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getTarikhAkhirAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTarikhAkhirAttribute($value)
    {
        $this->attributes['tarikh_akhir'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
