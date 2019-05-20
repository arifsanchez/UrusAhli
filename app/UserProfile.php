<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class UserProfile extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'user_profiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const JANTINA_RADIO = [
        'm' => 'Lelaki',
        'f' => 'Perempuan',
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
        'user_id',
        'jantina',
        'pekerjaan',
        'nama_penuh',
        'created_at',
        'updated_at',
        'deleted_at',
        'cawangan_id',
        'phone_number',
        'jenis_keahlian',
        'status_keahlian',
        'status_perkahwinan',
    ];

    public function cawangan()
    {
        return $this->belongsTo(Cawangan::class, 'cawangan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getuserPhotoAttribute()
    {
        $file = $this->getMedia('user_photo')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }
}
