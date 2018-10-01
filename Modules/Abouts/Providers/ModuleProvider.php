<?php

namespace TypiCMS\Modules\Abouts\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Abouts\Composers\SidebarViewComposer;
use TypiCMS\Modules\Abouts\Facades\Abouts;
use TypiCMS\Modules\Abouts\Models\About;
use TypiCMS\Modules\Abouts\Repositories\EloquentAbout;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.abouts'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['abouts' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'abouts');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/abouts'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Abouts', Abouts::class);

        // Observers
        About::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('abouts::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('abouts');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Abouts', EloquentAbout::class);
    }
}
