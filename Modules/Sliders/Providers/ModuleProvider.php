<?php

namespace TypiCMS\Modules\Sliders\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Sliders\Composers\SidebarViewComposer;
use TypiCMS\Modules\Sliders\Facades\Sliders;
use TypiCMS\Modules\Sliders\Models\Slider;
use TypiCMS\Modules\Sliders\Repositories\EloquentSlider;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.sliders'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['sliders' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'sliders');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/sliders'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Sliders', Sliders::class);

        // Observers
        Slider::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('sliders::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('sliders');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Sliders', EloquentSlider::class);
    }
}
