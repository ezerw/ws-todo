<?php

namespace Tests\Feature;

use App\Todo;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_browse_todos()
    {
        $user = factory(User::class)->create();

        factory(Todo::class)->create([
            'name' => 'make progress!!',
            'user_id' => $user->id
        ]);

        $response = $this->actingAs($user)->getJson('/api/todos');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [[
                    'name' => 'make progress!!',
                    'completed' => false
                ]]
            ]);
    }

    /** @test */
    public function a_user_can_create_a_todo()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->postJson('/api/todos', [
            'name' => 'buy milk',
            'user_id' => $user->id
        ]);

        $response->assertStatus(200)
                 ->assertJson([
                    'data' => [
                        "name" => "buy milk",
                        "completed" => false
                    ]
                 ]);
    }


}
