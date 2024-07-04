<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request as FacadesRequest;

use App\Models\PelakuUsaha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
public function index()
    {
        // Ambil data pelaku usaha beserta kecamatannya
        $data = PelakuUsaha::join('alamat', 'pelaku_usaha.id_usaha', '=', 'alamat.id_usaha')
            ->select('alamat.kecamatan', 'pelaku_usaha.jenis_badan_usaha', DB::raw('count(*) as total'))
            ->groupBy('alamat.kecamatan', 'pelaku_usaha.jenis_badan_usaha')
            ->get();

        // Siapkan data untuk chart
        $kecamatan = ['Balikpapan Selatan', 'Balikpapan Kota', 'Balikpapan Timur', 'Balikpapan Utara', 'Balikpapan Tengah', 'Balikpapan Barat'];
        $jenisUsaha = ['perseorangan', 'PT', 'CV'];

        $chartData = [];
        foreach ($kecamatan as $kec) {
            $tempData = ['kecamatan' => $kec];
            foreach ($jenisUsaha as $jenis) {
                $total = $data->where('kecamatan', $kec)->where('jenis_badan_usaha', $jenis)->first()->total ?? 0;
                $tempData[$jenis] = $total;
            }
            $chartData[] = $tempData;
        }

        // dd($chartData, $kecamatan, $jenisUsaha); 

        return view('dashboard', compact('chartData', 'kecamatan', 'jenisUsaha'));
    }
}