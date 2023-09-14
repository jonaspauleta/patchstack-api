<?php

use App\Models\Factor;
use App\Models\Vulnerability;

it('can retrieve factors associated with a vulnerability', function () {
    $vulnerability = Vulnerability::factory()->create();

    $factor1 = Factor::factory()->create(['vulnerability_id' => $vulnerability->id]);
    $factor2 = Factor::factory()->create(['vulnerability_id' => $vulnerability->id]);

    $factors = $vulnerability->factors;

    expect($factors->count())->toBe(2);
    expect($factors->pluck('id'))->toContain($factor1->id);
    expect($factors->pluck('id'))->toContain($factor2->id);
});

it('can retrieve the vulnerability associated with a factor', function () {
    $vulnerability = Vulnerability::factory()->create();

    $factor = Factor::factory()->create(['vulnerability_id' => $vulnerability->id]);

    $associatedVulnerability = $factor->vulnerability;

    expect($associatedVulnerability->id)->toBe($vulnerability->id);
    expect($associatedVulnerability->code)->toBe($vulnerability->code);
});
