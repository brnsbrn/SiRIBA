<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Kbli;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class KbliControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_store_kbli_data()
    {
        // Arrange: Persiapkan data input yang akan digunakan untuk tes
        $data = [
            'id_kbli' => ['12345'],
            'jenis_kbli' => ['Industri Makanan'],
        ];

        // Act: Lakukan POST request ke route storekbli
        $response = $this->post(route('data-kbli.store'), $data);

        // Assert: Periksa apakah data berhasil disimpan ke database
        $response->assertStatus(200); // Pastikan request berhasil
        $response->assertJson(['success' => 'Data berhasil disimpan.']); // Pastikan pesan sukses muncul

        // Verifikasi bahwa data tersebut ada di database
        $this->assertDatabaseHas('kbli', [
            'id_kbli' => '12345',
            'jenis_kbli' => 'Industri Makanan',
        ]);
    }
}
