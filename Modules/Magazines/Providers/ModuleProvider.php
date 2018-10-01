<?php

namespace TypiCMS\Modules\Magazines\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Magazines\Composers\SidebarViewComposer;
use TypiCMS\Modules\Magazines\Facades\Magazines;
use TypiCMS\Modules\Magazines\Models\Magazine;
use TypiCMS\Modules\Magazines\Repositories\EloquentMagazine;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.magazines'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['magazines' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'magazines');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/magazines'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Magazines', Magazines::class);

        // Observers
        Magazine::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('magazines::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('magazines');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Magazines', EloquentMagazine::class);
    }
}
