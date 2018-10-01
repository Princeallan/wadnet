<?php

namespace TypiCMS\Modules\Subscriptions\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use TypiCMS\Modules\Core\Facades\TypiCMS;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'TypiCMS\Modules\Subscriptions\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return null
     */
    public function map()
    {
        Route::namespace($this->namespace)->group(function (Router $router) {

            /*
             * Front office routes
             */
            if ($page = TypiCMS::getPageLinkedToModule('subscriptions')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-subscriptions');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::subscription');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('subscriptions', 'AdminController@index')->name('admin::index-subscriptions')->middleware('can:see-all-subscriptions');
                $router->get('subscriptions/create', 'AdminController@create')->name('admin::create-subscription')->middleware('can:create-subscription');
                $router->get('subscriptions/{subscription}/edit', 'AdminController@edit')->name('admin::edit-subscription')->middleware('can:update-subscription');
                $router->get('subscriptions/{subscription}/files', 'AdminController@files')->name('admin::edit-subscription-files')->middleware('can:update-subscription');
                $router->post('subscriptions', 'AdminController@store')->name('admin::store-subscription')->middleware('can:create-subscription');
                $router->put('subscriptions/{subscription}', 'AdminController@update')->name('admin::update-subscription')->middleware('can:update-subscription');
                $router->patch('subscriptions/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-subscription-ajax')->middleware('can:update-subscription');
                $router->delete('subscriptions/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-subscription')->middleware('can:delete-subscription');
            });
        });
    }
}
