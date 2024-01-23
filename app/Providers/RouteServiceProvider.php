<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('blog')
                ->group(base_path('routes/blog/guest.php'));

            Route::prefix('/')
                ->group(base_path('routes/callback-transactions.php'));

            Route::middleware('api')
                ->prefix('user/guest')
                ->group(base_path('routes/user/guest.php'));

            Route::middleware(['api', 'auth.jwt'])
                ->prefix('user/member')
                ->group(base_path('routes/user/member.php'));

            Route::middleware(['api', 'auth.jwt'])
                ->prefix('shop/member')
                ->group(base_path('routes/shop/member.php'));

            Route::middleware('api')
                ->prefix('shop/guest')
                ->group(base_path('routes/shop/guest.php'));

            Route::middleware(['api', 'auth.jwt'])
                ->prefix('code/member')
                ->group(base_path('routes/code/member.php'));

            Route::middleware('api')
                ->prefix('code/guest')
                ->group(base_path('routes/code/guest.php'));

            Route::middleware('api')
                ->prefix('code/midtrans')
                ->group(base_path('routes/code/midtrans.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('auth.jwt', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
