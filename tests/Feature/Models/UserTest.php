<?php

use App\Models\User;
use App\Models\Vulnerability;

it('can retrieve vulnerabilities associated with a user', function () {
    $user = User::factory()->create();
    $vulnerability1 = Vulnerability::factory()->create(['user_id' => $user->id]);
    $vulnerability2 = Vulnerability::factory()->create(['user_id' => $user->id]);

    $vulnerabilities = $user->vulnerabilities;

    expect($vulnerabilities->count())->toBe(2);

    expect($vulnerabilities->pluck('id'))->toContain($vulnerability1->id);
    expect($vulnerabilities->pluck('id'))->toContain($vulnerability2->id);
});

it('can check if a user is an admin', function () {
    $adminUser = User::factory()->create(['is_admin' => true]);
    $regularUser = User::factory()->create(['is_admin' => false]);

    expect($adminUser->is_admin)->toBe(true);
    expect($regularUser->is_admin)->toBe(false);
});
