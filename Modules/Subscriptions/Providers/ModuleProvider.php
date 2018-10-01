<?php

namespace TypiCMS\Modules\Subscriptions\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use TypiCMS\Modules\Core\Facades\TypiCMS;
use TypiCMS\Modules\Core\Observers\SlugObserver;
use TypiCMS\Modules\Subscriptions\Composers\SidebarViewComposer;
use TypiCMS\Modules\Subscriptions\Facades\Subscriptions;
use TypiCMS\Modules\Subscriptions\Models\Subscription;
use TypiCMS\Modules\Subscriptions\Repositories\EloquentSubscription;

class ModuleProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'typicms.subscriptions'
        );
        $this->mergeConfigFrom(
            __DIR__.'/../config/permissions.php', 'typicms.permissions'
        );

        $modules = $this->app['config']['typicms']['modules'];
        $this->app['config']->set('typicms.modules', array_merge(['subscriptions' => ['linkable_to_page']], $modules));

        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'subscriptions');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/subscriptions'),
        ], 'typicms-views');

        AliasLoader::getInstance()->alias('Subscriptions', Subscriptions::class);

        // Observers
        Subscription::observe(new SlugObserver());

        /*
         * Sidebar view composer
         */
        $this->app->view->composer('core::admin._sidebar', SidebarViewComposer::class);

        /*
         * Add the page in the view.
         */
        $this->app->view->composer('subscriptions::public.*', function ($view) {
            $view->page = TypiCMS::getPageLinkedToModule('subscriptions');
        });
    }

    public function register()
    {
        $app = $this->app;

        /*
         * Register route service provider
         */
        $app->register(RouteServiceProvider::class);

        $app->bind('Subscriptions', EloquentSubscription::class);
    }
}
