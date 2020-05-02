<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory('App\User')->create();
        $response = $this->actingAs($user)->get('/home');

        $response->assertStatus(200)
            ->assertSeeText('You are logged in!');
    }
}
