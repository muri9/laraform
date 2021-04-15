<?php

namespace App\Providers;

use App\Models\Claim;
use App\Models\Role;
use App\Models\User;
use App\Policies\ClaimPolicy;
use Carbon\Carbon;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Claim::class => ClaimPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // https://laravel.com/docs/8.x/authorization#writing-gates
        Gate::define('claims-create', function (User $user) {
            if ($user->hasRole(Role::CLIENT)) {
                $count = Auth::user()->claims()->where('created_at', '>=', Carbon::today())->count();
                if ($count >= 1)
                    return Response::deny('You can create claim once a day');
            }
            return Response::allow();
        });

        Gate::define('claims-update', function (User $user) {
            return $user->hasRole(Role::MANAGER);
        });

        Gate::define('claims-index', function (User $user) {
            return $user->hasRole(Role::MANAGER);
        });
    }
}
