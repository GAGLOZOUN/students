<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class CreateStudentTest extends TestCase
{
   use RefreshDatabase;
    public function test_auth_can_create_student()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/students', [
            'title' => 'Ma nouvelle tâche',
            'detail' => 'Tous les détails de ma nouvelle tâche',
        ]);
        $this->assertDatabaseHas('students', [
            'title' => 'Ma nouvelle tâche'
        ]);
        $this->get('/students')
             ->assertSee('Ma nouvelle tâche');

     /*$user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['foo' => 'bar'])
                         ->get('/');*/
    }
}
