<?php

use Illuminate\Support\Str;
use Illuminate\Testing\TestResponse;
use Modules\Organizations\Models\Cluster;
use Modules\Organizations\Models\Organization;
use Modules\Organizations\Resources\ClusterResource;
use Modules\Paths\Resources\PathResource;

beforeEach(function () {
    $this->method = 'GET';
    $this->routeName = 'organizations.clusters.index';
    $this->org = Organization::factory()->create();

    Cluster::factory()
        ->create([
            'organization_id' => $this->org->id,
            'name' => 'test_cluster_1',
            'created_at' => '2021-01-01 00:00:00',
        ]);

    Cluster::factory()
        ->create([
            'organization_id' => $this->org->id,
            'name' => '__dummy_name_2__',
            'created_at' => '2021-01-01 01:00:00',
        ]);

    Cluster::factory()
        ->create([
            'organization_id' => $this->org->id,
            'name' => '__dummy_name_3__',
            'created_at' => '2021-01-01 02:00:00',
        ]);
});

it('expects /organizations/{org}/clusters with invalid organization id to return 404', function () {
    $route = route($this->routeName, ['org' => 'invalid_org_id']);
    $this->assertNotFoundOnNonExistingOrganization($this->method, $route);
});

it('expects /organizations/{org}/clusters to return data', function (array $query, int $expects) {
    $route = route($this->routeName, ['org' => $this->org] + $query);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response->assertOk()
        ->assertJsonCount($expects, 'data');
})->with([
    ['data' => [], 'expects' => 3],
    ['data' => ['page' => 1], 'expects' => 3],
    ['data' => ['page' => 2], 'expects' => 0],
    ['data' => ['per_page' => 3], 'expects' => 3],
    ['data' => ['per_page' => 1], 'expects' => 1],
]);

it('can filter by a unique "name" field', function () {
    $route = route($this->routeName, ['org' => $this->org, 'filter[name]' => 'test_cluster_1']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(1, 'data');

    $this->assertPaginatedResponseHas($response, 0, ['name' => 'test_cluster_1']);
});

it('can filter by a random "lms_id"', function () {
    /** @var TestResponse $response */
    $response = $this->get(
        route($this->routeName, ['org' => $this->org, 'filter[lms_id]' => 'random_lms_id'])
    );

    $response
        ->assertOk()
        ->assertJsonCount(0, 'data');
});

it('can filter by a exact "lms_id" field', function () {
    $cluster = Cluster::factory()
        ->create([
            'organization_id' => $this->org->id,
            'lms_id' => Str::random(),
        ]);

    Cluster::factory()
        ->create([
            'organization_id' => $this->org->id,
            'lms_id' => Str::random(),
        ]);

    $route = route($this->routeName, ['org' => $this->org, 'filter[lms_id]' => $cluster->lms_id]);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(1, 'data');

    $this->assertPaginatedResponseHas($response, 0, ['name' => $cluster->name]);
});

it('accepts the valid filters', function () {
    $route = route($this->routeName, ['org' => $this->org]);
    $this->assertEndpointAcceptsValidFilters($route, ['name', 'lms_id']);
});

it('fails on filtering by a non-existing filter', function () {
    $route = route($this->routeName, ['org' => $this->org, 'filter[non_existing]' => '__dummy_value__']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected filter key is invalid. Valid keys are: name, lms_id',
        ]);
});

it('can sort by "ASC" on the "created_at" field', function () {
    $route = route($this->routeName, ['org' => $this->org, 'sort' => 'created_at']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(3, 'data');

    $this->assertPaginatedResponseHas($response, 0, ['name' => 'test_cluster_1']);
    $this->assertPaginatedResponseHas($response, 1, ['name' => '__dummy_name_2__']);
    $this->assertPaginatedResponseHas($response, 2, ['name' => '__dummy_name_3__']);
});

it('can sort by "DESC" on the "created_at" field', function () {
    $route = route($this->routeName, ['org' => $this->org, 'sort' => '-created_at']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(3, 'data');

    $this->assertPaginatedResponseHas($response, 0, ['name' => '__dummy_name_3__']);
    $this->assertPaginatedResponseHas($response, 1, ['name' => '__dummy_name_2__']);
    $this->assertPaginatedResponseHas($response, 2, ['name' => 'test_cluster_1']);
});

it('can sort by "ASC" on the "name" field', function () {
    $route = route($this->routeName, ['org' => $this->org, 'sort' => 'name']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(3, 'data');

    $this->assertPaginatedResponseHas($response, 0, ['name' => '__dummy_name_2__']);
    $this->assertPaginatedResponseHas($response, 1, ['name' => '__dummy_name_3__']);
    $this->assertPaginatedResponseHas($response, 2, ['name' => 'test_cluster_1']);
});

it('fails on filtering by a non-existing sort', function () {
    $route = route($this->routeName, ['org' => $this->org, 'sort' => 'non_existing']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected sort value is invalid. Valid values are: name, -name, created_at, -created_at',
        ]);
});

it('can filter depending on the provided orgId', function () {
    $newOrg = Organization::factory()->create();

    Cluster::factory()
        ->create([
            'organization_id' => $newOrg->id,
            'name' => '__dummy_new_name__',
            'created_at' => '2021-01-01 00:00:00',
        ]);

    $route = route($this->routeName, ['org' => $this->org, 'filter[name]' => 'new_name']);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $response
        ->assertOk()
        ->assertJsonCount(0, 'data');
});

it('can assert the resource', function () {
    $route = route($this->routeName, ['org' => $this->org]);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $this->assertResource(ClusterResource::class, $response);
});

it('fails asserting the resource', function () {
    $route = route($this->routeName, ['org' => $this->org]);

    /** @var TestResponse $response */
    $response = $this->get($route);

    $this->checkWrongResource(PathResource::class, $response);
});
