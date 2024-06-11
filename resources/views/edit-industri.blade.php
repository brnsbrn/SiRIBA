@extends('layout.main')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Industri</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/siriba/data-industri') }}">Data Industri</a></li>
                        <li class="breadcrumb-item active">Tambah Data Industri</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                <!-- Card for Data Pelaku Usaha -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pelaku Usaha</h3>
                    </div>
                    <form action="{{ route('data-industri.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <!-- Data Pelaku Usaha -->
                            <div class="form-group">
                                <label for="NIB">NIB</label>
                                <input type="text" class="form-control" id="NIB" name="NIB" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_badan_usaha">Jenis Badan Usaha</label>
                                <select class="form-control" id="jenis_badan_usaha" name="jenis_badan_usaha" required>
                                    <option value="Perseorangan">Perseorangan</option>
                                    <option value="PT">PT</option>
                                    <option value="CV">CV</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="skala_usaha">Skala Usaha</label>
                                <select class="form-control" id="skala_usaha" name="skala_usaha" required>
                                    <option value="Mikro">Mikro</option>
                                    <option value="Kecil">Kecil</option>
                                    <option value="Menengah">Menengah</option>
                                    <option value="Besar">Besar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="risiko">Risiko Usaha</label>
                                <select class="form-control" id="risiko" name="risiko" required>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Menengah Rendah">Menengah Rendah</option>
                                    <option value="Menengah Tinggi">Menengah Tinggi</option>
                                    <option value="Tinggi">Tinggi</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jenis_proyek">Jenis Proyek</label>
                                <select class="form-control" id="jenis_proyek" name="jenis_proyek" required>
                                    <option value="Utama">Utama</option>
                                    <option value="Pendukung">Pendukung</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_permohonan">Tanggal Permohonan</label>
                                <input type="date" class="form-control" id="tanggal_permohonan" name="tanggal_permohonan"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" required>
                            </div>
                            <div class="form-group">
                                <label for="id_kbli">KBLI</label>
                                <select class="form-control" id="id_kbli" name="id_kbli" required>
                                    @foreach ($kbli as $k)
                                        <option value="{{ $k->id_kbli }}">{{ $k->id_kbli }} - {{ $k->jenis_kbli }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat_usaha">Alamat Usaha</label>
                                <input type="text" class="form-control" id="alamat_usaha" name="alamat_usaha" required>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                    <option value="Balikpapan Selatan">Balikpapan Selatan</option>
                                    <option value="Balikpapan Kota">Balikpapan Kota</option>
                                    <option value="Balikpapan Timur">Balikpapan Timur</option>
                                    <option value="Balikpapan Utara">Balikpapan Utara</option>
                                    <option value="Balikpapan Tengah">Balikpapan Tengah</option>
                                    <option value="Balikpapan Barat">Balikpapan Barat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <select class="form-control" id="kelurahan" name="kelurahan" required>
                                    <option value="">Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Tenaga Kerja</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah_tki_laki_laki">Jumlah TKI Laki-laki</label>
                            <input type="number" class="form-control" id="jumlah_tki_laki_laki"
                                name="jumlah_tki_laki_laki" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_tki_perempuan">Jumlah TKI Perempuan</label>
                            <input type="number" class="form-control" id="jumlah_tki_perempuan"
                                name="jumlah_tki_perempuan" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_tenaga_kerja_asing">Jumlah Tenaga Kerja Asing</label>
                            <input type="number" class="form-control" id="jumlah_tenaga_kerja_asing"
                                name="jumlah_tenaga_kerja_asing" required>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Investasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="modal_usaha">Modal Usaha</label>
                            <input type="number" class="form-control" id="modal_usaha" name="modal_usaha"
                                step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="investasi_mesin">Investasi Mesin</label>
                            <input type="number" class="form-control" id="investasi_mesin" name="investasi_mesin"
                                step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="investasi_lainnya">Investasi Lainnya</label>
                            <input type="number" class="form-control" id="investasi_lainnya" name="investasi_lainnya"
                                step="0.01" required>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Produk</h3>
                    </div>
                    <div class="card-body">
                        <div id="produk-container">
                            <div class="produk-item">
                                <div class="form-group">
                                    <label for="kapasitas_produksi">Kapasitas Produksi</label>
                                    <div id="kapasitas-produksi-container">
                                        <div class="kapasitas-produksi-item">
                                            <input type="text" name="kapasitas_produksi[0][nama_produk]"
                                                placeholder="Nama Produk" required>
                                            <input type="number" name="kapasitas_produksi[0][kapasitas]"
                                                placeholder="Kapasitas" required>
                                            <input type="text" name="kapasitas_produksi[0][satuan]"
                                                placeholder="Satuan" required>
                                            <select name="kapasitas_produksi[0][id_kbli]" required>
                                                @foreach ($kbli as $item)
                                                    <option value="{{ $item->id_kbli }}">{{ $item->id_kbli }} -
                                                        {{ $item->jenis_kbli }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" onclick="addKapasitasProduksi()">Tambah Kapasitas
                                        Produksi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary ml-2">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('kecamatan').addEventListener('change', function() {
            var kecamatan = this.value;
            var kelurahanSelect = document.getElementById('kelurahan');

            kelurahanSelect.innerHTML = '';

            var kelurahanOptions = [];

            if (kecamatan === 'Balikpapan Selatan') {
                kelurahanOptions = [
                    'Gunung Bahagia',
                    'Sepinggan',
                    'Damai Baru',
                    'Damai Bahagia',
                    'Sungai Nangka',
                    'Sepinggan Raya',
                    'Sepinggan Baru'
                ];
            } else if (kecamatan === 'Balikpapan Kota') {
                kelurahanOptions = [
                    'Prapatan',
                    'Telaga Sari',
                    'Klandasan Ulu',
                    'Klandasan Ilir',
                    'Damai'
                ];
            } else if (kecamatan === 'Balikpapan Barat') {
                kelurahanOptions = [
                    'Baru Tengah',
                    'Margasari',
                    'Margo Mulyo',
                    'Baru Ulu',
                    'Baru Ilir',
                    'Kariangau'
                ];
            } else if (kecamatan === 'Balikpapan Timur') {
                kelurahanOptions = [
                    'Manggar',
                    'Manggar Baru',
                    'Lamaru',
                    'Teritip'
                ];
            } else if (kecamatan === 'Balikpapan Utara') {
                kelurahanOptions = [
                    'Muara Rapak',
                    'Gunung Samarinda',
                    'Batu Ampar',
                    'Karang Joang',
                    'Gunung Samarinda Baru',
                    'Graha Indah'
                ];
            } else if (kecamatan === 'Balikpapan Tengah') {
                kelurahanOptions = [
                    'Gunung Sari Ilir',
                    'Gunung Sari Ulu',
                    'Mekar Sari',
                    'Karang Rejo',
                    'Sumber Rejo',
                    'Karang Jati'
                ];
            }

            kelurahanOptions.forEach(function(kelurahan) {
                var option = document.createElement('option');
                option.value = kelurahan;
                option.text = 'Kelurahan ' + kelurahan;
                kelurahanSelect.appendChild(option);
            });
        });
    </script>

    <script>
        let kapasitasProduksiCount = 1;

        function addKapasitasProduksi() {
            const container = document.getElementById('kapasitas-produksi-container');
            const item = document.createElement('div');
            item.classList.add('kapasitas-produksi-item');
            item.innerHTML = `
                <input type="text" name="kapasitas_produksi[${kapasitasProduksiCount}][nama_produk]" placeholder="Nama Produk" required>
                <input type="number" name="kapasitas_produksi[${kapasitasProduksiCount}][kapasitas]" placeholder="Kapasitas" required>
                <input type="text" name="kapasitas_produksi[${kapasitasProduksiCount}][satuan]" placeholder="Satuan" required>
                <select name="kapasitas_produksi[${kapasitasProduksiCount}][id_kbli]" required>
                    @foreach ($kbli as $item)
                        <option value="{{ $item->id_kbli }}">{{ $item->id_kbli }} - {{ $item->jenis_kbli }}</option>
                    @endforeach
                </select>
            `;
            container.appendChild(item);
            kapasitasProduksiCount++;
        }
    </script>
@endsection
