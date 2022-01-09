<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PegawaiTest extends TestCase
{
    public function test_example()
    {
        $response = $this->get('/pegawai-test');

        $response->assertStatus(200);
    }
}
