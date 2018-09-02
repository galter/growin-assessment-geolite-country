<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CountryTest extends TestCase {
    public function testCountryIP() {
        $response = $this->json('GET', '/api/locationByIP', ['IP'=> '2.16.6.8']);

        $response
            ->assertSuccessful()
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['Country']
            ])
            ->assertJsonFragment([
                'Country' => 'Germany', 
            ]);

       /* dd($response->json()); */
    }
}
