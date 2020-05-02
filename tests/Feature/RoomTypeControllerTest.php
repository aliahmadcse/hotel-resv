<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RoomTypeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        Cache::shouldReceive('get')
            ->once()
            ->with('key')
            ->andReturn('value');

        $response = $this->get('/room_types');

        $response->assertStatus(200)
            ->assertSeeText('Name')
            ->assertViewIs('roomTypes.index');
    }

    public function testUpdateFile()
    {
        $file = UploadedFile::fake()->image('sample.jpg');
        $roomType = factory('App\RoomType')->create();
        $response = $this->put(
            "/room_types/{$roomType->id}",
            ['picture' => $file]
        );

        $response->assertStatus(302)
            ->assertRedirect('/room_types');

        Storage::disk('public')->assertExists('/uploads/' . $file->hashName());
    }
}
