<?php

namespace RoleCms;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use RoleCms\Service\RoleCmsChecker as Check;
use Illuminate\Support\Facades\Gate;

class RoleCmsServiceProvider extends ServiceProvider {

    /**
     * Seeds to register
     *
     * @var array
     */
    protected $seeds = [
        'RolesTableSeeder' => RolesTableSeeder::class
    ];

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'RoleCms';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map(): void {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void {

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->registerGates();

        parent::boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->commands(Commands\BuildTable::class);
        $this->mergeConfigFrom(__DIR__ . '/Config/rolecms.php', 'rolecms');
//        
        parent::register();
    }

    public function registerGates() {

        foreach (config('rolecms.abilities') as $module => $actions) {

            foreach ($actions as $action) {

                $ability = $module . '.' . $action;

                Gate::define($ability, function ($user) use($ability) {
                    return $user->hasAccess($ability) ?: false;
                });
            }
        }
    }

}
