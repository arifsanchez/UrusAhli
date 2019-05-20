<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class RekodPembayaran extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'rekod_pembayarans';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tarikh_transaksi',
    ];

    const STATUS_TRANSAKSI_SELECT = [
        'disemak' => 'Disemak',
        'pending' => 'Pending Semakan',
    ];

    const JENIS_PEMBAYARAN_SELECT = [
        'tunai'            => 'Tunai',
        'bank_in'          => 'Bank Transfer',
        'internet_banking' => 'Internet Banking',
        'cheque'           => 'Cek',
    ];

    const TUJUAN_PEMBAYARAN_SELECT = [
        'yuran_keahlian'  => 'Yuran Keahlian',
        'yuran_tahunan'   => 'Yuran Tahunan',
        'derma_sumbangan' => 'Derma / Sumbangan',
    ];

    protected $fillable = [
        'ahli_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'jenis_pembayaran',
        'diterima_oleh_id',
        'tarikh_transaksi',
        'status_transaksi',
        'tujuan_pembayaran',
        'jumlah_pembayaran',
    ];

    public function ahli()
    {
        return $this->belongsTo(UserProfile::class, 'ahli_id');
    }

    public function getbuktiPembayaranAttribute()
    {
        return $this->getMedia('bukti_pembayaran');
    }

    public function diterima_oleh()
    {
        return $this->belongsTo(User::class, 'diterima_oleh_id');
    }

    public function getTarikhTransaksiAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTarikhTransaksiAttribute($value)
    {
        $this->attributes['tarikh_transaksi'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
