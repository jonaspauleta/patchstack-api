<?php

use App\Models\User;
use Laravel\Sanctum\Sanctum;

it('can get authenticated user details', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $response = $this->get('/api/user');

    $response->assertStatus(200);
});

it('can register a new user', function () {
    $userData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ];

    $response = $this->post('/api/register', $userData);

    $response->assertStatus(201);
});

it('can update user password', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $requestData = [
        'old_password' => 'password',
        'new_password' => 'new_password',
        'new_password_confirmation' => 'new_password',
    ];

    $response = $this->put('/api/user', $requestData);

    $response->assertStatus(200);
});
