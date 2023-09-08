<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Factor;
use App\Models\Vulnerability;
use App\Policies\FactorPolicy;
use App\Policies\VulnerabilityPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Vulnerability::class => VulnerabilityPolicy::class,
        Factor::class => FactorPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
