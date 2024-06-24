<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investasi extends Model
{
    use HasFactory;

    protected $table = 'investasi';
    protected $primaryKey = 'id_investasi';
    protected $fillable = ['modal_usaha', 'investasi_mesin', 'investasi_lainnya', 'id_usaha'];

    public function pelakuUsaha()
    {
        return $this->belongsTo('App\Models\PelakuUsaha', 'id_usaha');
    }

    // public function getModalUsahaAttribute($value)
    // {
    //     return 'Rp ' . number_format($value, 2, ',', '.');
    // }

    // public function getInvestasiMesinAttribute($value)
    // {
    //     return 'Rp ' . number_format($value, 2, ',', '.');
    // }

    // public function getInvestasiLainnyaAttribute($value)
    // {
    //     return 'Rp ' . number_format($value, 2, ',', '.');
    // }
}
