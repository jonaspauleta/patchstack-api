<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('can create & save a user with random data', function () {
    $user = User::factory()->create();

    $this->assertDatabaseHas('users', [
        'id' => $user->id,
    ]);
});

it('can create & save a user with custom data', function () {
    $data = [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => Hash::make('password'),
        'is_admin' => false,
    ];

    $user = User::factory()->create($data);

    $this->assertDatabaseHas('users', $data);
});
