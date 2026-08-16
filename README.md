# Sistem Informasi Industri Balikpapan (SiRIBA)

**SiRIBA (Sistem Informasi Industri Balikpapan)** adalah aplikasi yang saya kembangkan ketika bekerja di **Dinas Koperasi, UMKM, dan Perindustrian (DKUMKMP) Kota Balikpapan**.

Aplikasi ini dibuat untuk membantu DKUMKMP mengelola data **Industri Kecil dan Menengah (IKM)** di Kota Balikpapan dalam satu sistem. Selain berfungsi sebagai tempat penyimpanan dan pengelolaan data, SiRIBA juga menyediakan data yang dapat digunakan untuk melihat kondisi industri berdasarkan wilayah, klasifikasi usaha, tenaga kerja, investasi, dan kapasitas produksi.

Yang menarik dari proyek ini adalah perannya tidak hanya sebagai aplikasi CRUD. Dalam proyek ini saya terlibat pada **dua sisi pekerjaan**, yaitu sebagai **Software Developer** yang membangun aplikasi pengelolaan data dan sebagai **Data Engineer** yang menangani proses pengambilan, penyimpanan, dan pengelolaan data dari sumber pusat.

---

## Peran Saya

Dalam proyek SiRIBA, saya menangani beberapa bagian utama:

### 1. Software Development

Saya membangun aplikasi menggunakan:

- **PHP**
- **Laravel**
- **MySQL**
- **Blade**
- **AdminLTE**
- **JavaScript / jQuery**
- **DataTables**

Beberapa fungsi yang dikembangkan meliputi:

- autentikasi pengguna;
- pengelolaan data industri;
- pencarian dan penyaringan data;
- penambahan data industri;
- perubahan data;
- penghapusan data;
- pengelolaan data KBLI;
- pengelolaan data tenaga kerja;
- pengelolaan data investasi;
- pengelolaan kapasitas produksi;
- relasi antardata industri.

### 2. Data Engineering

Selain membangun aplikasi, saya juga menangani alur data dari sumber pusat ke aplikasi.

Secara konsep, alurnya adalah:

```text
Data Industri dari Sistem Pusat
             │
             ▼
        API / Data Source
             │
             ▼
      Proses Pengambilan Data
             │
             ▼
       Validasi & Mapping
             │
             ▼
      Database SiRIBA
             │
             ▼
     Aplikasi SiRIBA
             │
       ┌─────┴─────┐
       ▼           ▼
 Data Management  Analysis
```

Dengan pendekatan tersebut, aplikasi SiRIBA berfungsi sebagai **data warehouse operasional** untuk data industri yang dibutuhkan oleh DKUMKMP.

> **Catatan:** repository yang tersedia saat ini terutama berisi bagian aplikasi dan database SiRIBA. Kode integrasi API dari sistem pusat tidak termasuk dalam snapshot repository ini. Penjelasan mengenai proses pengambilan data API di atas berdasarkan alur kerja proyek yang saya kerjakan saat pengembangan sistem.

---

# Latar Belakang

Sebelum adanya sistem terpusat, data industri perlu dikelola agar dapat digunakan kembali untuk kebutuhan administrasi maupun analisis.

Masalah yang ingin diselesaikan bukan hanya tempat menyimpan data, tetapi juga bagaimana data tersebut dapat:

- dikumpulkan dari sumber pusat;
- disimpan dalam struktur yang lebih terorganisasi;
- dicari dengan cepat;
- diperbarui ketika terjadi perubahan;
- dikelompokkan berdasarkan karakteristik usaha;
- digunakan untuk melihat kondisi industri di berbagai wilayah.

Karena itu, SiRIBA saya bangun sebagai sistem yang menghubungkan **pengelolaan data** dengan **kebutuhan analisis**.

---

# Tujuan Pengembangan

Tujuan utama SiRIBA adalah membuat pengelolaan data IKM menjadi lebih terstruktur dan mudah digunakan.

Secara lebih spesifik, aplikasi ini dibuat untuk:

1. Menyediakan satu tempat untuk menyimpan data industri.
2. Mengurangi ketergantungan pada pengelolaan data secara manual.
3. Memudahkan pencarian data berdasarkan berbagai atribut.
4. Menghubungkan data usaha dengan alamat, KBLI, tenaga kerja, investasi, dan kapasitas produksi.
5. Menyediakan data yang lebih siap digunakan untuk analisis.
6. Memudahkan proses pembaruan dan pemeliharaan data.
7. Menjadi lapisan penyimpanan data antara sumber pusat dan kebutuhan operasional DKUMKMP.

---

# Data yang Dikelola

SiRIBA tidak hanya menyimpan identitas usaha. Data industri dibagi menjadi beberapa kelompok yang saling berhubungan.

| Kelompok Data | Contoh Informasi |
|---|---|
| **Pelaku Usaha** | NIB, nama usaha, badan usaha, skala usaha, risiko, jenis proyek, tanggal permohonan |
| **KBLI** | Kode KBLI dan jenis kegiatan industri |
| **Alamat** | Alamat usaha, kecamatan, kelurahan |
| **Tenaga Kerja** | Tenaga kerja laki-laki, perempuan, dan tenaga kerja asing |
| **Investasi** | Modal usaha, investasi mesin, investasi lainnya |
| **Kapasitas Produksi** | Nama produk, KBLI produk, kapasitas, satuan |

Struktur tersebut membuat satu data usaha dapat memiliki informasi yang lebih lengkap daripada sekadar identitas dasar.

---

# Struktur Data

Secara sederhana, hubungan data dalam aplikasi dapat digambarkan sebagai berikut:

```text
                    ┌──────────────┐
                    │     KBLI     │
                    └──────┬───────┘
                           │
                           │
                    ┌──────▼───────┐
                    │ Pelaku Usaha │
                    └──────┬───────┘
                           │
             ┌─────────────┼──────────────┬───────────────┐
             │             │              │               │
             ▼             ▼              ▼               ▼
        ┌────────┐   ┌────────────┐  ┌───────────┐  ┌──────────────────┐
        │ Alamat │   │Tenaga Kerja│  │ Investasi │  │Kapasitas Produksi│
        └────────┘   └────────────┘  └───────────┘  └──────────────────┘
```

Pada database, struktur tersebut direpresentasikan melalui beberapa tabel:

```text
pelaku_usaha
├── alamat
├── tenaga_kerja
├── investasi
└── kapasitas_produksi

kbli
└── digunakan oleh pelaku_usaha dan kapasitas_produksi
```

Relasi tersebut memungkinkan informasi terkait satu usaha diambil bersama ketika dibutuhkan.

---

# Arsitektur Sistem

Secara keseluruhan, sistem dapat dipahami melalui tiga lapisan:

```text
┌───────────────────────────────────────┐
│             DATA SOURCE              │
│                                       │
│     Sistem Pusat / API Industri      │
└───────────────────┬───────────────────┘
                    │
                    ▼
┌───────────────────────────────────────┐
│          DATA MANAGEMENT              │
│                                       │
│   Validasi → Mapping → Database      │
│                                       │
│             MySQL                    │
└───────────────────┬───────────────────┘
                    │
                    ▼
┌───────────────────────────────────────┐
│             APPLICATION               │
│                                       │
│              Laravel                 │
│                                       │
│ CRUD • Search • Filter • Reporting   │
└───────────────────┬───────────────────┘
                    │
                    ▼
┌───────────────────────────────────────┐
│              USER / OPD               │
│                                       │
│      Pengelolaan & Analisis Data     │
└───────────────────────────────────────┘
```

Dengan arsitektur tersebut, SiRIBA tidak hanya berperan sebagai aplikasi pencatatan, tetapi juga sebagai **lapisan pengelolaan data** sebelum data digunakan oleh pengguna.

---

# Data Flow

Proses pengelolaan data yang saya gunakan dapat digambarkan sebagai berikut:

### 1. Data berasal dari sistem pusat

Data industri tersedia pada sumber pusat yang dapat diakses melalui API.

### 2. Data diambil dari sumber

Data diambil dari pusat dan diproses agar dapat digunakan oleh aplikasi SiRIBA.

### 3. Data disesuaikan dengan struktur database

Field dari sumber data dipetakan ke struktur database SiRIBA.

Contohnya:

```text
Data Usaha
    │
    ├── Identitas Usaha
    ├── KBLI
    ├── Alamat
    ├── Tenaga Kerja
    ├── Investasi
    └── Kapasitas Produksi
```

### 4. Data disimpan di database lokal aplikasi

Setelah data diproses, data disimpan pada database SiRIBA sehingga aplikasi dapat menggunakannya tanpa harus selalu mengambil data langsung dari sumber pusat.

### 5. Data digunakan oleh aplikasi

Pengguna kemudian dapat:

- mencari data;
- memfilter data;
- melihat detail usaha;
- menambahkan data;
- mengubah data;
- menghapus data;
- melihat data investasi;
- melihat data tenaga kerja;
- melihat kapasitas produksi;
- menggunakan data untuk kebutuhan analisis.

---

# Fitur Utama

## 1. Data Industri

Halaman utama untuk melihat seluruh data industri yang tersimpan di SiRIBA.

Pengguna dapat melihat informasi seperti:

- nama usaha;
- NIB;
- jenis badan usaha;
- KBLI;
- skala usaha;
- tingkat risiko;
- tanggal permohonan;
- jenis proyek;
- alamat;
- kecamatan;
- kelurahan;
- kontak usaha.

Data juga dapat dicari menggunakan beberapa parameter.

### Filter yang tersedia

- Nama
- NIB
- KBLI
- Jenis badan usaha
- Skala usaha
- Risiko
- Jenis proyek
- Kecamatan
- Kelurahan

---

## 2. Input dan Perubahan Data

SiRIBA menyediakan formulir untuk menambahkan dan memperbarui data industri.

Satu proses input dapat mencakup beberapa informasi yang saling berhubungan:

```text
Data Pelaku Usaha
       │
       ├── Alamat
       ├── Tenaga Kerja
       ├── Investasi
       └── Kapasitas Produksi
```

Pada proses penyimpanan dan perubahan data, transaksi database digunakan agar perubahan pada beberapa tabel dapat dilakukan secara konsisten.

Jika salah satu proses mengalami kegagalan, transaksi dapat dibatalkan sehingga data tidak tersimpan dalam kondisi setengah jadi.

---

## 3. Data KBLI

Halaman KBLI digunakan untuk mengelola klasifikasi kegiatan industri.

Fungsinya meliputi:

- menampilkan daftar KBLI;
- menambahkan KBLI;
- mengubah KBLI;
- menghapus KBLI;
- melakukan validasi kode KBLI.

Kode KBLI divalidasi dengan panjang lima karakter dan dicegah agar tidak terjadi duplikasi.

---

## 4. Data Tenaga Kerja

Data tenaga kerja menyimpan jumlah:

- tenaga kerja laki-laki;
- tenaga kerja perempuan;
- tenaga kerja asing.

Data tersebut dapat digunakan untuk melihat kontribusi tenaga kerja pada sektor industri.

---

## 5. Data Investasi

Modul investasi menyimpan:

- modal usaha;
- investasi mesin;
- investasi lainnya.

Data ini dapat digunakan sebagai dasar untuk melihat skala investasi yang terdapat pada sektor industri.

---

## 6. Kapasitas Produksi

Modul kapasitas produksi menyimpan informasi:

- nama produk;
- KBLI produk;
- kapasitas produksi;
- satuan kapasitas.

Karena satu usaha dapat menghasilkan lebih dari satu produk, hubungan antara usaha dan kapasitas produksi dibuat sebagai **one-to-many**.

---

# Validasi dan Konsistensi Data

Salah satu bagian penting dalam aplikasi adalah memastikan data yang masuk sesuai dengan struktur yang telah ditentukan.

Beberapa validasi yang diterapkan antara lain:

- NIB wajib diisi;
- nama usaha wajib diisi;
- email harus memiliki format yang valid;
- tanggal permohonan harus berupa tanggal;
- data tenaga kerja harus berupa angka;
- data investasi harus berupa angka;
- kode KBLI harus sesuai format;
- kode KBLI tidak boleh duplikat;
- data kapasitas produksi harus memiliki nama produk, kapasitas, dan satuan.

Validasi ini dilakukan sebelum data disimpan ke database.

---

# Database Transaction

Pada proses yang melibatkan beberapa tabel, saya menggunakan database transaction.

Contohnya ketika menambahkan satu data industri:

```text
BEGIN TRANSACTION
        │
        ├── Insert Pelaku Usaha
        ├── Insert Alamat
        ├── Insert Tenaga Kerja
        ├── Insert Investasi
        └── Insert Kapasitas Produksi
        │
        ▼
      COMMIT
```

Jika terjadi kesalahan:

```text
BEGIN TRANSACTION
        │
        ├── Insert / Update
        │
        ├── Error
        │
        ▼
      ROLLBACK
```

Pendekatan ini digunakan agar data antar tabel tetap konsisten.

---

# Teknologi yang Digunakan

| Teknologi | Penggunaan |
|---|---|
| **PHP 8.2+** | Bahasa pemrograman |
| **Laravel 11** | Framework aplikasi |
| **MySQL** | Database relasional |
| **Blade** | Template engine |
| **AdminLTE** | Antarmuka dashboard |
| **jQuery** | Interaksi pada sisi klien |
| **DataTables** | Tabel, pencarian, dan pengelolaan data |
| **JavaScript** | Interaksi antarmuka |
| **API** | Sumber data dari sistem pusat |

> Versi Laravel dan PHP di atas mengacu pada konfigurasi repository yang tersedia saat ini.

---

# Struktur Project

Struktur utama aplikasi mengikuti pola Laravel:

```text
SiRIBA/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── DataController.php
│   │       ├── InvestasiController.php
│   │       ├── KapasitasController.php
│   │       ├── KbliController.php
│   │       └── TenagaKerjaController.php
│   │
│   └── Models/
│       ├── Alamat.php
│       ├── Investasi.php
│       ├── KapasitasProduksi.php
│       ├── Kbli.php
│       ├── PelakuUsaha.php
│       ├── TenagaKerja.php
│       └── User.php
│
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
│
├── resources/
│   └── views/
│       ├── data-industri.blade.php
│       ├── data-investasi.blade.php
│       ├── data-kapasitas.blade.php
│       ├── data-tenaker.blade.php
│       ├── input-industri.blade.php
│       ├── input-kbli.blade.php
│       ├── edit-industri.blade.php
│       └── edit-kbli.blade.php
│
├── routes/
│   └── web.php
│
└── composer.json
```

---

# Contoh Endpoint Aplikasi

Beberapa route utama yang tersedia:

```text
GET     /siriba/data-industri
GET     /siriba/data-industri/input-industri
POST    /siriba/data-industri
PUT     /siriba/data-industri/{id}
DELETE  /siriba/data-industri/{id}

GET     /siriba/data-kbli
POST    /siriba/data-kbli
PUT     /siriba/data-kbli/update-kbli/{id}
DELETE  /siriba/data-kbli/delete-kbli/{id}

GET     /siriba/data-tenaga-kerja
GET     /siriba/data-investasi
GET     /siriba/data-kapasitas-produksi
```

Endpoint tersebut digunakan oleh aplikasi untuk menangani proses pengelolaan data.

---

# Tantangan Teknis

Beberapa bagian yang menurut saya paling penting dari proyek ini bukan sekadar membuat halaman web, tetapi bagaimana memastikan data yang dikelola tetap dapat digunakan dengan baik.

### 1. Mengelola data dari sumber yang berbeda

Data berasal dari sistem pusat sehingga struktur data yang diterima harus disesuaikan dengan kebutuhan database SiRIBA.

### 2. Menjaga hubungan antarentitas

Data industri tidak berdiri sendiri. Satu usaha memiliki alamat, data tenaga kerja, investasi, dan kapasitas produksi.

Karena itu, struktur database perlu dirancang agar hubungan antarentitas tetap jelas.

### 3. Menjaga konsistensi saat melakukan perubahan

Ketika satu data usaha diubah, beberapa tabel terkait juga dapat ikut berubah. Penggunaan transaction membantu mencegah sebagian data berhasil diperbarui sementara data lainnya gagal.

### 4. Menyediakan pencarian yang praktis

Pengguna tidak selalu mengetahui ID internal data. Karena itu, pencarian dibuat berdasarkan atribut yang lebih mudah digunakan seperti nama, NIB, KBLI, kecamatan, dan kelurahan.

---

# Peran Saya dalam Proyek

Proyek ini merupakan salah satu proyek yang cukup merepresentasikan kombinasi kemampuan saya sebagai **Software Developer dan Data Engineer**.

Sebagai **Software Developer**, saya:

- merancang struktur aplikasi;
- membangun backend menggunakan Laravel;
- membuat model dan relasi database;
- membuat controller dan route;
- membuat halaman pengelolaan data;
- membuat proses CRUD;
- menerapkan validasi;
- menangani database transaction;
- membuat fitur pencarian dan filter.

Sebagai **Data Engineer**, saya:

- mengambil data dari sumber pusat melalui API;
- menyesuaikan struktur data dengan kebutuhan aplikasi;
- memetakan data ke struktur database;
- menyimpan data dalam database yang dapat digunakan aplikasi;
- menjaga konsistensi hubungan antarentitas;
- menyiapkan data agar dapat digunakan kembali untuk kebutuhan analisis.

Dengan demikian, tanggung jawab saya berada pada dua sisi:

```text
                DATA
                 │
        ┌────────┴────────┐
        ▼                 ▼
 Data Engineering   Software Development
        │                 │
        ▼                 ▼
  Data Pipeline      Laravel Application
        │                 │
        └────────┬────────┘
                 ▼
          SiRIBA System
```

---

# Tampilan Aplikasi

Berikut adalah beberapa tampilan SiRIBA yang menunjukkan fitur pengelolaan data dan antarmuka aplikasi.

## Halaman Utama dan Data Industri

![SiRIBA - Dashboard](https://github.com/user-attachments/assets/99e3c2bb-6208-44cf-9b26-aa5587bf3bbf)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/01d76fbc-bdb1-4ee7-b600-391af997c817)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/45d6857b-7fc5-443a-b542-c1bc23640d1a)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/0717861b-ae25-4865-a29f-0a8d1e1ef556)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/65d77783-6b43-45f6-a9a6-619aace5ca0e)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/dce03ce7-9ad5-433c-b35f-d991f14fc363)

![SiRIBA - Data Industri](https://github.com/user-attachments/assets/8ab59acf-2ddf-4d87-bfff-08e7b78211d3)

## Modul Data Pendukung

![SiRIBA - KBLI](https://github.com/user-attachments/assets/9d697241-e3d4-4f81-9873-5e58bc851539)

![SiRIBA - Data](https://github.com/user-attachments/assets/9cd26a85-b547-412c-8218-90921fb1cb2f)

![SiRIBA - Data](https://github.com/user-attachments/assets/a10e110c-5784-4672-855f-ae6223902f36)

![SiRIBA - Data](https://github.com/user-attachments/assets/a300903b-71e3-47e7-a018-72766070f5c1)

![SiRIBA - Data](https://github.com/user-attachments/assets/177cd527-8650-4d06-85ff-20939b5c5f1c)

![SiRIBA - Data](https://github.com/user-attachments/assets/b169361a-097e-45ce-a0c1-896165b35750)

---

# Pengembangan Selanjutnya

SiRIBA masih dapat dikembangkan lebih jauh, terutama pada sisi data engineering dan analisis.

Beberapa pengembangan yang dapat dilakukan:

- membuat proses sinkronisasi API secara otomatis;
- menambahkan scheduler untuk pengambilan data berkala;
- membuat mekanisme pencatatan riwayat sinkronisasi;
- menambahkan log untuk data yang gagal diproses;
- membuat validasi perubahan data antara sumber pusat dan database lokal;
- menambahkan dashboard analitik secara langsung;
- menambahkan analisis perkembangan jumlah IKM berdasarkan waktu;
- menganalisis persebaran IKM berdasarkan kecamatan dan kelurahan;
- menganalisis tenaga kerja berdasarkan sektor industri;
- menganalisis investasi berdasarkan skala usaha dan KBLI;
- menganalisis kapasitas produksi berdasarkan jenis industri.

Dengan pengembangan tersebut, SiRIBA dapat bergerak dari sistem pengelolaan data menjadi **platform data industri yang mendukung kebutuhan analisis dan pengambilan keputusan**.

---

# Pembelajaran dari Proyek

Proyek SiRIBA memberikan pengalaman dalam mengerjakan aplikasi yang tidak hanya berfokus pada tampilan, tetapi juga pada bagaimana data bergerak dan digunakan di dalam sistem.

Beberapa hal yang saya pelajari dan terapkan antara lain:

- pengembangan aplikasi menggunakan Laravel;
- perancangan database relasional;
- pembuatan model dan relasi Eloquent;
- pengembangan CRUD;
- validasi data;
- database transaction;
- pencarian dan filter data;
- integrasi data dari API;
- proses pemetaan data;
- pengelolaan data dalam jumlah besar;
- pemisahan data berdasarkan entitas;
- penyusunan data agar siap digunakan untuk analisis.

Yang paling penting dari proyek ini adalah saya tidak hanya berada di sisi aplikasi.

Saya perlu memahami **dari mana data berasal, bagaimana data masuk ke sistem, bagaimana data disimpan, bagaimana hubungan antardata dibangun, dan bagaimana data tersebut akhirnya digunakan oleh pengguna.**

Itulah alasan proyek ini menjadi salah satu proyek yang paling relevan untuk menunjukkan kombinasi kemampuan saya di bidang **Software Development, Data Engineering, dan Data Management**.

---

# Ringkasan

| Aspek | Detail |
|---|---|
| **Nama Proyek** | SiRIBA — Sistem Informasi Industri Balikpapan |
| **Instansi** | DKUMKMP Kota Balikpapan |
| **Peran** | Software Developer & Data Engineer |
| **Backend** | Laravel |
| **Bahasa** | PHP |
| **Database** | MySQL |
| **Frontend** | Blade, AdminLTE, JavaScript, jQuery |
| **Data Source** | Sistem pusat melalui API |
| **Fungsi Utama** | Pengelolaan, penyimpanan, pencarian, dan analisis data IKM |
| **Entitas Utama** | Pelaku Usaha, KBLI, Alamat, Tenaga Kerja, Investasi, Kapasitas Produksi |
| **Jenis Sistem** | Web-based Information System & Data Management |

---

## Penutup

SiRIBA bukan hanya aplikasi untuk menyimpan data industri. Proyek ini saya kerjakan dengan melihat keseluruhan alur data, mulai dari **sumber data, proses pengambilan, penyimpanan, pengelolaan, sampai data tersebut dapat digunakan oleh pengguna**.

Dari proyek ini, saya mendapatkan pengalaman bahwa membangun sistem data yang baik tidak berhenti pada membuat aplikasi yang dapat berjalan. Struktur data, hubungan antartabel, validasi, konsistensi, dan cara data tersebut nantinya digunakan juga harus dipikirkan sejak awal.

