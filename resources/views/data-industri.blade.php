@extends('layout.main')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Industri di Balikpapan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Industri</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- Flash messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row mb-2">
                <div class="col-12">
                    <a href="{{ route('data-industri.input') }}" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Seluruh Data IKM di Balikpapan</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIB</th>
                                        <th>Jenis Badan Usaha</th>
                                        <th>ID KBLI</th>
                                        <th>KBLI</th>
                                        <th>Skala Usaha</th>
                                        <th>Risiko Usaha</th>
                                        <th>Tanggal Permohonan</th>
                                        <th>Jenis Proyek</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pelakuUsaha as $usaha)
                                        <tr>
                                            <td>{{ $usaha->nama }}</td>
                                            <td>{{ $usaha->NIB }}</td>
                                            <td>{{ $usaha->jenis_badan_usaha }}</td>
                                            <td>{{ $usaha->id_kbli }}</td>
                                            <td>{{ $usaha->kbli->jenis_kbli }}</td>
                                            <td>{{ $usaha->skala_usaha }}</td>
                                            <td>{{ $usaha->risiko }}</td>
                                            <td>{{ \Carbon\Carbon::parse($usaha->tanggal_permohonan)->format('d-m-Y') }}
                                            </td>
                                            <td>{{ $usaha->jenis_proyek }}</td>
                                            <td>{{ $usaha->email }}</td>
                                            <td>{{ $usaha->no_telp }}</td>
                                            <td>{{ $usaha->alamat->alamat_usaha }}</td>
                                            <td>{{ $usaha->alamat->kecamatan }}</td>
                                            <td>{{ $usaha->alamat->kelurahan }}</td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIB</th>
                                        <th>Jenis Badan Usaha</th>
                                        <th>ID KBLI</th>
                                        <th>KBLI</th>
                                        <th>Skala Usaha</th>
                                        <th>Risiko Usaha</th>
                                        <th>Tanggal Permohonan</th>
                                        <th>Jenis Proyek</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Alamat</th>
                                        <th>Kecamatan</th>
                                        <th>Kelurahan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                responsive: true,
                columnDefs: [{
                    targets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14],
                    className: 'dt-head-center'
                }],
                columns: [{
                        data: "nama"
                    },
                    {
                        data: "NIB"
                    },
                    {
                        data: "jenis_badan_usaha"
                    },
                    {
                        data: "id_kbli"
                    },
                    {
                        data: "kbli.jenis_kbli"
                    },
                    {
                        data: "skala_usaha"
                    },
                    {
                        data: "risiko"
                    },
                    {
                        data: "tanggal_permohonan",
                        render: function(data, type, row) {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {
                        data: "jenis_proyek"
                    },
                    {
                        data: "email"
                    },
                    {
                        data: "no_telp"
                    },
                    {
                        data: "alamat.alamat_usaha"
                    },
                    {
                        data: "alamat.kecamatan"
                    },
                    {
                        data: "alamat.kelurahan"
                    },
                    {
                        data: "aksi"
                    }
                ]
            });
        });
    </script>
@endsection
