<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    
        // 0 - Usuário comum
        // 1 - Parceiro
        // 2 - Usuário pago
        // 3 - Administrador
        Gate::define('admin', function () {
            return Auth::user()->category == 3;
        });

        Gate::define('user', function () {
            return Auth::user()->category == 0;
        });

        Gate::define('opcao:plantao', function () {
            return Auth::user()->opcao == 1;
        });
    }
}
