<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class PegawaiTest extends TestCase
{
    use WithFaker;
    use WithoutMiddleware;
    
    /** @test **/
    public function it_get_data() {
        $response = $this->get(route("pegawai.index"));
        $response->assertStatus(200);
    }

    /** @test **/
    public function it_store_data() {
        $pegawai = Pegawai::factory()->create();

        $response = $this->post(route("pegawai.store"), [
                "nama_pegawai" => $this->faker->word(10),
                "total_gaji" => $this->faker->numberBetween($min = 4000000, $max = 10000000),
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route("pegawai.index"));

    }
}
