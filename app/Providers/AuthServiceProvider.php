<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    const TOKEN_EXPIRY_DURATION = 30;

    /**
     * Register any authentication / authorization services.
 */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::tokensExpireIn(now()->addDays(self::TOKEN_EXPIRY_DURATION));
        Passport::refreshTokensExpireIn(now()->addDays(self::TOKEN_EXPIRY_DURATION));
        Passport::personalAccessTokensExpireIn(now()->addDays(self::TOKEN_EXPIRY_DURATION));
    }
}
