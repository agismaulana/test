<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class GajiPegawaiTest extends TestCase
{
    use WithoutMiddleware;

    /** @test **/
    public function it_get_data() {
        $response = $this->get(route('gaji_pegawai.index'));

        $response->assertStatus(200);
    }

    /** @test **/ 
    public function it_store_data() {
        $pegawai = Pegawai::factory()->create();

        $response = $this->post(route('gaji_pegawai.store'), [
            'id_pegawai' => $pegawai->id,
            'total_diterima' => $pegawai->total_gaji, 
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('gaji_pegawai.index'));
    }

    /** @test **/
    public function it_store_batch_data() {
        $arr_id = [];
        $arr_total = [];
        $pegawai = Pegawai::all();
        for($i = 0; $i < count($pegawai); $i++) {
            array_push($arr_id, $pegawai[$i]->id);
            array_push($arr_total, $pegawai[$i]->total_gaji);
        }

        $response = $this->post(route('gaji_pegawai.store_batch'), [
            'id_pegawai' => $arr_id,
            'total_diterima' => $arr_total,
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('gaji_pegawai.index'));
    } 
}
