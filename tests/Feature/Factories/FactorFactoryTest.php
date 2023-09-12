<?php

use App\Models\Factor;
use App\Models\Vulnerability;

it('can create & save a factor with random data', function () {
    $factor = Factor::factory()->create();

    $this->assertDatabaseHas('factors', [
        'id' => $factor->id,
        'vulnerability_id' => $factor->vulnerability_id,
    ]);

    $this->assertNotNull($factor->vulnerability_id);
});

it('can create & associate a factor to the new vulnerability', function () {
    $factor = Factor::factory()->create();

    $this->assertDatabaseHas('factors', [
        'id' => $factor->id,
        'vulnerability_id' => $factor->vulnerability_id,
    ]);

    $this->assertNotNull($factor->vulnerability_id);

    $this->assertDatabaseHas('vulnerabilities', [
        'id' => $factor->vulnerability_id,
    ]);
});

it('can create & save a factor with custom data', function () {
    $vulnerability = Vulnerability::factory()->create();

    $data = [
        'name' => 'FACTOR',
        'value' => 1.1,
        'vulnerability_id' => $vulnerability->id,
    ];

    $factor = Factor::factory()->create($data);

    $this->assertNotNull($factor->vulnerability_id);

    $this->assertDatabaseHas('factors', $data);
});
