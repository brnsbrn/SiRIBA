<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';
    protected $primaryKey = 'id_alamat';
    protected $fillable = ['alamat_usaha', 'kelurahan', 'kecamatan', 'id_usaha'];

    public function pelakuUsaha()
    {
        return $this->belongsTo('App\Models\PelakuUsaha', 'id_usaha');
    }

    public static function getKelurahanByKecamatan($kecamatan)
    {
        $kelurahan = [
            'Balikpapan Selatan' => ['Gunung Bahagia', 'Sepinggan', 'Damai Baru', 'Damai Bahagia', 'Sungai Nangka', 'Sepinggan Raya', 'Sepinggan Baru'],
            'Balikpapan Kota' => ['Prapatan', 'Telaga Sari', 'Klandasan Ulu', 'Klandasan Ilir', 'Damai'],
            'Balikpapan Timur' => ['Manggar', 'Manggar Baru', 'Lamaru', 'Teritip'],
            'Balikpapan Utara' => ['Muara Rapak', 'Gunung Samarinda', 'Batu Ampar', 'Karang Joang', 'Gunung Samarinda Baru', 'Graha Indah'],
            'Balikpapan Tengah' => ['Gunung Sari Ilir', 'Gunung Sari Ulu', 'Mekar Sari', 'Karang Rejo', 'Sumber Rejo', 'Karang Jati'],
            'Balikpapan Barat' => ['Baru Tengah', 'Margasari', 'Margo Mulyo', 'Baru Ulu', 'Baru Ilir', 'Kariangau']
        ];

        return isset($kelurahan[$kecamatan]) ? $kelurahan[$kecamatan] : [];
    }
}
