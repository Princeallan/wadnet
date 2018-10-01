<?php

namespace TypiCMS\Modules\Abouts\Providers;

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
    protected $namespace = 'TypiCMS\Modules\Abouts\Http\Controllers';

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
            if ($page = TypiCMS::getPageLinkedToModule('abouts')) {
                $router->middleware('public')->group(function (Router $router) use ($page) {
                    $options = $page->private ? ['middleware' => 'auth'] : [];
                    foreach (locales() as $lang) {
                        if ($page->translate('status', $lang) && $uri = $page->uri($lang)) {
                            $router->get($uri, $options + ['uses' => 'PublicController@index'])->name($lang.'::index-abouts');
                            $router->get($uri.'/{slug}', $options + ['uses' => 'PublicController@show'])->name($lang.'::about');
                        }
                    }
                });
            }

            /*
             * Admin routes
             */
            $router->middleware('admin')->prefix('admin')->group(function (Router $router) {
                $router->get('abouts', 'AdminController@index')->name('admin::index-abouts')->middleware('can:see-all-abouts');
                $router->get('abouts/create', 'AdminController@create')->name('admin::create-about')->middleware('can:create-about');
                $router->get('abouts/{about}/edit', 'AdminController@edit')->name('admin::edit-about')->middleware('can:update-about');
                $router->get('abouts/{about}/files', 'AdminController@files')->name('admin::edit-about-files')->middleware('can:update-about');
                $router->post('abouts', 'AdminController@store')->name('admin::store-about')->middleware('can:create-about');
                $router->put('abouts/{about}', 'AdminController@update')->name('admin::update-about')->middleware('can:update-about');
                $router->patch('abouts/{ids}', 'AdminController@ajaxUpdate')->name('admin::update-about-ajax')->middleware('can:update-about');
                $router->delete('abouts/{ids}', 'AdminController@destroyMultiple')->name('admin::destroy-about')->middleware('can:delete-about');
            });
        });
    }
}
