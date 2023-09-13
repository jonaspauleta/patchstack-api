<?php

use App\Models\User;

it('can log in a user', function () {
    $user = User::factory()->create();

    $response = $this->post('/api/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertStatus(200);
});

it('can log out a user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->post('/api/logout');

    $response->assertStatus(200);
});
