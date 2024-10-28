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
     * Le chemin vers la route "home" de votre application.
     *
     * Typiquement, les utilisateurs sont redirigés ici après l'authentification.
     *
     * @var string
     */
    public const HOME = 'user/dashboard';

    /**
     * Définir les liaisons de modèle de route, les filtres de motifs
     * et d'autres configurations de route.
     */
    public function boot(): void
    {
        // Configuration de la limitation de taux des requêtes
        $this->configureRateLimiting();

        // Enregistrement des groupes de routes
        $this->routes(function () {
            // Charger les routes API avec le préfixe 'api' et appliquer le middleware 'api'
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // Charger les routes web générales avec le middleware 'web'
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Charger les routes Admin avec les middlewares 'auth' et 'role:admin'
            Route::middleware(['web', 'auth', 'role:admin']) // Ajout des middlewares
                ->prefix('admin')
                ->as('admin.') // Préfixer les noms de route avec 'admin.'
                ->group(base_path('routes/admin.php'));

            // Charger les routes Coach avec les middlewares 'auth' et 'role:coach'
            Route::middleware(['web', 'auth', 'role:coach']) // Ajout des middlewares
                ->prefix('coach')
                ->as('coach.') // Préfixer les noms de route avec 'coach.'
                ->group(base_path('routes/coach.php'));
        });
    }

    /**
     * Configurer les limitateurs de requêtes pour l'application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
