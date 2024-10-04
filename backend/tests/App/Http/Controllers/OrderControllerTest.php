<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
{
    $response = $this->post('api/order', [
        'name' => 'Croissant',
        'price' => 10, 
        'quantity' => 2,
    ]);

}

public function test_order_not_found()
        {
            $response = $this->get('api/user/123');

            $response->assertStatus(404);

            $responseData = $response->json();
            $this->assertArrayHasKey('error', $responseData);
            $this->assertEquals('Usuário não encontrado.', $responseData['error']);
        }

public function test_password_is_hashed()
        {
            $user = User::create([
                'name' => 'Bruno',
                'email' => 'bruno@gmail.com',
                'password' => Hash::make('123456789')
            ]);

            $this->assertTrue(Hash::check('123456789', $user->password));
            $this->assertFalse(Hash::check('wrongpassword', $user->password));
        }

}

