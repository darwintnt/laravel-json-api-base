<?php

namespace Tests\Feature\Users;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ListUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_fetch_single()
    {

        //$this->withoutExceptionHandling();

        User::factory(10)->create();

        $response = $this->jsonApi()->get('api/v1/users/share')->assertStatus(Response::HTTP_OK);

        $response->assertJson([
            'data' => [
                'type' => 'users',
                'id' => (string) $response['data']['id'],
                'attributes' => [
                    'name' => $response['data']['attributes']['name'],
                    'email' => $response['data']['attributes']['email'],
                    'created-at' => $response['data']['attributes']['created-at'],
                    'updated-at' => $response['data']['attributes']['updated-at'],
                ]
            ]
        ]);
    }
}
