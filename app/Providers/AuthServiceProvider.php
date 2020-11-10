<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Passport;
use Laravel\Passport\PersonalAccessClient;
use Lcobucci\JWT\Token;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
//        Passport::routes();
//        Passport::useTokenModel(Token::class);
//        Passport::useClientModel(Client::class);
//        Passport::useAuthCodeModel(AuthCode::class);
//        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }
}
