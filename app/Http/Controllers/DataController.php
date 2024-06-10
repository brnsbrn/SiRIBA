<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Investasi;
use App\Models\KapasitasProduksi;
use App\Models\Kbli;
use App\Models\PelakuUsaha;
use App\Models\TenagaKerja;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index() 
    {
        $pelakuUsaha = PelakuUsaha::with(['kbli', 'alamat'])->get();
        return view('data-industri', compact('pelakuUsaha'));
    }

    public function inputindustri()
    {
        $kbli = Kbli::all();
        return view('input-industri', compact('kbli'));
    }

    public function storeindustri(Request $request)
    {
        $validated = $request->validate([
            'NIB' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jenis_badan_usaha' => 'required|string',
            'skala_usaha' => 'required|string',
            'risiko' => 'required|string',
            'jenis_proyek' => 'required|string',
            'tanggal_permohonan' => 'required|date',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'id_kbli' => 'required|string|max:255',
            'alamat_usaha' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'jumlah_tki_laki_laki' => 'required|integer',
            'jumlah_tki_perempuan' => 'required|integer',
            'jumlah_tenaga_kerja_asing' => 'required|integer',
            'modal_usaha' => 'required|numeric',
            'investasi_mesin' => 'required|numeric',
            'investasi_lainnya' => 'required|numeric',
            'nama_produk' => 'required|array',
            'kapasitas' => 'required|array',
            'satuan' => 'required|array',
        ]);

        // Simpan Data Pelaku Usaha
        $pelaku_usaha = PelakuUsaha::create([
            'NIB' => $validated['NIB'],
            'nama' => $validated['nama'],
            'jenis_badan_usaha' => $validated['jenis_badan_usaha'],
            'skala_usaha' => $validated['skala_usaha'],
            'risiko' => $validated['risiko'],
            'jenis_proyek' => $validated['jenis_proyek'],
            'tanggal_permohonan' => $validated['tanggal_permohonan'],
            'email' => $validated['email'],
            'no_telp' => $validated['no_telp'],
            'id_kbli' => $validated['id_kbli'],
        ]);

        // Simpan Alamat
        Alamat::create([
            'id_usaha' => $pelaku_usaha->id_usaha,
            'alamat_usaha' => $validated['alamat_usaha'],
            'kecamatan' => $validated['kecamatan'],
            'kelurahan' => $validated['kelurahan'],
        ]);

        // Simpan Data Tenaga Kerja
        TenagaKerja::create([
            'id_usaha' => $pelaku_usaha->id_usaha,
            'jumlah_tki_laki_laki' => $validated['jumlah_tki_laki_laki'],
            'jumlah_tki_perempuan' => $validated['jumlah_tki_perempuan'],
            'jumlah_tenaga_kerja_asing' => $validated['jumlah_tenaga_kerja_asing'],
        ]);

        // Simpan Data Investasi
        Investasi::create([
            'id_usaha' => $pelaku_usaha->id_usaha,
            'modal_usaha' => $validated['modal_usaha'],
            'investasi_mesin' => $validated['investasi_mesin'],
            'investasi_lainnya' => $validated['investasi_lainnya'],
        ]);

        // Simpan Data Kapasitas Produksi
        foreach ($request->nama_produk as $index => $nama_produk) {
            KapasitasProduksi::create([
                'id_usaha' => $pelaku_usaha->id_usaha,
                'nama_produk' => $nama_produk,
                'kapasitas' => $request->kapasitas[$index],
                'satuan' => $request->satuan[$index],
                'id_kbli' => $request->id_kbli,
            ]);
        }

        return redirect()->route('data-industri')->with('success', 'Data industri berhasil disimpan.');
    }
}
