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
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Charger les routes API, préfixées par 'api' et appliquant le middleware 'api'
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Charger les routes web générales, appliquant le middleware 'web'
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Charger les routes spécifiques aux Admins, protégées par le middleware 'web'
            Route::middleware('web')
                ->group(base_path('routes/admin.php'));

            // Charger les routes spécifiques aux Coachs, protégées par le middleware 'web'
            Route::middleware('web')
                ->group(base_path('routes/coach.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
