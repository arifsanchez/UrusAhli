<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class UserProfile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'user_profiles';

    const JANTINA_RADIO = [
        'm' => 'Lelaki',
        'f' => 'Perempuan',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'tarikh_kelulusan',
    ];

    const JENIS_KEAHLIAN_SELECT = [
        'lifetime' => 'Ahli Seumur Hidup',
        'yearly'   => 'Ahli Biasa',
    ];

    const STATUS_KEAHLIAN_SELECT = [
        'diluluskan' => 'Diluluskan',
        'dibatalkan' => 'Dibatalkan',
    ];

    const STATUS_PERKAHWINAN_RADIO = [
        'kahwin'     => 'Berkahwin',
        'bujang'     => 'Bujang',
        'duda_janda' => 'Duda / Janda',
    ];

    const BANGSA_SELECT = [
        'melayu'    => 'Melayu',
        'cina'      => 'Cina',
        'india'     => 'India',
        'lain-lain' => 'Lain-Lain',
    ];

    protected $fillable = [
        'no_kp',
        'bangsa',
        'alamat',
        'jantina',
        'pekerjaan',
        'deleted_at',
        'updated_at',
        'nama_penuh',
        'created_at',
        'no_ahli_bhg',
        'cawangan_id',
        'no_ahli_cwg',
        'phone_number',
        'jenis_keahlian',
        'status_keahlian',
        'tarikh_kelulusan',
        'status_perkahwinan',
    ];

    public function cawangan()
    {
        return $this->belongsTo(Cawangan::class, 'cawangan_id');
    }

    public function getuserPhotoAttribute()
    {
        $file = $this->getMedia('user_photo')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }

    public function getTarikhKelulusanAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTarikhKelulusanAttribute($value)
    {
        $this->attributes['tarikh_kelulusan'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
