<?php

namespace amity\Providers;

use amity\View\ThemeViewFinder;
use amity\View\Composers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->app['view']->composer(['layouts.auth', 'layouts.backend'], Composers\addStatusMessage::class);
        $this->app['view']->composer('layouts.backend', Composers\addAdminUser::class);
        $this->app['view']->composer('layouts.frontend', Composers\injectPages::class);
        $this->app['view']->setFinder($this->app['theme.finder']); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.finder', function($app)
        {
            $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);

            $config = $app['config']['cms.theme'];

            $original_finder = $this->app['view']->getFinder();
            $finder->setHints($original_finder->getHints());

            $finder->setBasePath($app['path.public'].'/'.$config['folder']);

            $finder->setActiveTheme($config['active']);

            return $finder;
        });
    }
}
