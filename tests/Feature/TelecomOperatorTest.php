<?php

namespace Tests\Feature;

use Illuminate\Support\Str;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\User;
use App\Models\TelecomOperator;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TelecomOperatorTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create an admin user
        $this->admin = User::factory()->create([
            // Add role/permission if needed here
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }

    // [Test_not]
    public function admin_can_create_telecom_operator()
    {
        $data = TelecomOperator::factory()->make()->toArray();

        $response = $this->actingAs($this->admin)
            ->post(route('telecom_operator.store'), $data);

        $response->assertRedirect(route('telecom_operator.index'));
        $this->assertDatabaseHas('telecom_operators', [
            'name' => $data['name'],
            'slug' => Str::slug($data['name'], '_'),
        ]);
    }
/*
    // [Test_not]
    #[Group('telecom_operators')]
    public function admin_can_update_telecom_operator()
    {
        $operator = TelecomOperator::factory()->create();
        $newData = [
            'name' => 'Updated Name',
            'is_active' => true,
        ];

        $response = $this->actingAs($this->admin)
            ->put(route('telecom_operator.update', $operator), $newData, []);

        $response->assertRedirect(route('telecom_operator.index'));
        $this->assertDatabaseHas('telecom_operators', $newData);
    }*/

    // [Test_not]
    public function admin_can_delete_telecom_operator()
    {
        $operator = TelecomOperator::factory()->create();

        $response = $this->actingAs($this->admin)
            ->delete(route('telecom_operator.destroy', $operator));

        $response->assertRedirect(route('telecom_operator.index'));
        $this->assertDatabaseMissing('telecom_operators', ['id' => $operator->id]);
    }

    // [Test_not]
    public function guest_cannot_access_crud()
    {
        $operator = TelecomOperator::factory()->create();

        // Guest access create
        $this->post(route('telecom_operator.store'), [])->assertRedirect('/login');
        $this->put(route('telecom_operator.update', $operator), [])->assertRedirect('/login');
        $this->delete(route('telecom_operator.destroy', $operator))->assertRedirect('/login');
    }
}
