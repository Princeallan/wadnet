<?php

namespace TypiCMS\Modules\Sliders\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Sliders\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('sliders')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-sliders');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::slider');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('sliders', 'AdminController@index')->name('admin::index-sliders')->middleware('can:see-all-sliders');
                $router->get('sliders/create', 'AdminController@create')->name('admin::create-slider')->middleware('can:create-slider');
                $router->get('sliders/{slider}/edit', 'AdminController@edit')->name('admin::edit-slider')->middleware('can:update-slider');
                $router->get('sliders/{slider}/files', 'AdminController@files')->name('admin::edit-slider-files')->middleware('can:update-slider');
                $router->post('sliders', 'AdminController@store')->name('admin::store-slider')->middleware('can:create-slider');
                $router->put('sliders/{slider}', 'AdminController@update')->name('admin::update-slider')->middleware('can:update-slider');
                $router->patch('sliders/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-slider-ajax')->middleware('can:update-slider');
                $router->delete('sliders/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-slider')->middleware('can:delete-slider');
            });
        });
    }
}
