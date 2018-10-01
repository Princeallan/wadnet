<?php

namespace TypiCMS\Modules\Magazines\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Magazines\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('magazines')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-magazines');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::magazine');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('magazines', 'AdminController@index')->name('admin::index-magazines')->middleware('can:see-all-magazines');
                $router->get('magazines/create', 'AdminController@create')->name('admin::create-magazine')->middleware('can:create-magazine');
                $router->get('magazines/{magazine}/edit', 'AdminController@edit')->name('admin::edit-magazine')->middleware('can:update-magazine');
                $router->get('magazines/{magazine}/files', 'AdminController@files')->name('admin::edit-magazine-files')->middleware('can:update-magazine');
                $router->post('magazines', 'AdminController@store')->name('admin::store-magazine')->middleware('can:create-magazine');
                $router->put('magazines/{magazine}', 'AdminController@update')->name('admin::update-magazine')->middleware('can:update-magazine');
                $router->patch('magazines/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-magazine-ajax')->middleware('can:update-magazine');
                $router->delete('magazines/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-magazine')->middleware('can:delete-magazine');
            });
        });
    }
}
