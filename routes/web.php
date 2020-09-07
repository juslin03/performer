<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| {menu_id}/{submenu_id}
*/
Route::get('', 'Client\MenuController@index')->name('welcome');

// formations details show to client
Route::get('/f/{id}', 'Client\FormationController@show')->name(
    'client-see-formation'
);
// events details
Route::get('/e/{slug}', 'Client\MenuController@show_event')->name('see-this-event');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    Route::get('/admin/role-register', 'Admin\DashboardController@registered')->name('roles');
    Route::get('/admin/role-edit/{id}', 'Admin\DashboardController@edit')->name('edit');
    Route::put('/admin/editOne/{id}', 'Admin\DashboardController@editOne')->name('editOne');
    Route::delete('/admin/removeOne/{id}','Admin\DashboardController@removeOne')->name('removeOne');

    // about us
    Route::get('/admin/about-us', 'Admin\AboutUsController@index')->name('about-us');
    Route::post('/admin/about-us', 'Admin\AboutUsController@store')->name('save-about-us');
    Route::get('/admin/about-us/{id}', 'Admin\AboutUsController@edit')->name('about-us-value');
    Route::put('/admin/edit-about-us/{id}', 'Admin\AboutUsController@update')->name('editAboutUsOne');
    Route::delete('/admin/remove-about-us/{id}','Admin\AboutUsController@destroy')->name('removeOneAboutUs');

    // services routes
    Route::get('/admin/service-category', 'Admin\ServiceController@index')->name('service-category');
    Route::get('/admin/service-category/new', 'Admin\ServiceController@create')->name('new-category');
    Route::post('/admin/service-category', 'Admin\ServiceController@store')->name('add-category');
    Route::get('/admin/service-category-to-update/{id}', 'Admin\ServiceController@edit')->name('service-to-edit');
    Route::put('/admin/service-category-to-update/{id}', 'Admin\ServiceController@update')->name('editServiceCategoryOne');
    Route::delete('/admin/remove-service-category/{id}', 'Admin\ServiceController@destroy')->name('removeOneServie');

    // service list
    Route::get('/admin/services-list', 'Admin\ServiceListController@index')->name('services-list');
    Route::post('/admin/service-list-add', 'Admin\ServiceListController@store')->name('new-service-list');
    Route::get('/admin/service-list/{id}', 'Admin\ServiceListController@edit')->name('edit-service-list');
    Route::put('/admin/update-service-list/{id}', 'Admin\ServiceListController@update')->name('update-service-list');

    // menus
    Route::get('/admin/menus', 'Client\MenuController@menu')->name('menus');
    Route::get('/admin/menus/new', 'Client\MenuController@create')->name('new-menu');
    Route::post('/admin/menus/add-new', 'Client\MenuController@store')->name('add-menu');
    Route::get('/admin/menus/{id}', 'Client\MenuController@show')->name('see-menu');
    Route::get('/admin/menus/{id}/{sub_id}/sous-menu', 'Client\SousMenuController@create')->name('new-submenu');
    Route::post('/admin/menus/{id}/sous-menu/add-new-submenu', 'Client\SousMenuController@store')->name('add-new-submenu');

    // formations
    Route::get('/admin/formations', 'Admin\FormationController@index')->name('formations');
    Route::get('/admin/formations/new', 'Admin\FormationController@create')->name('new-formation');
    Route::get('/admin/formations/formation-{id}', 'Admin\FormationController@show')->name('see-formation');
    Route::post('/admin/formations/new', 'Admin\FormationController@store')->name('add-formation');
    Route::get('/admin/formations/formation-{id}/edit', 'Admin\FormationController@edit')->name('edit-formation');
    Route::put('/admin/formations/formation-{id}/update', 'Admin\FormationController@update')->name('update-formation');
    Route::delete('/admin/remove-formation/{id}', 'Admin\FormationController@destroy')->name('remove-formation');

    // blog
    Route::get('/admin/blog', 'Admin\FormationController@blog')->name('blog');

    // evenements
    Route::get('/admin/events', 'Admin\EvenementController@index')->name('all-events');
    Route::get('/admin/events/new', 'Admin\EvenementController@create')->name('new-event');
    Route::post('/admin/events/new', 'Admin\EvenementController@store')->name('store-event');
    Route::get('/admin/events/event-{slug}', 'Admin\EvenementController@show')->name('see-one-event');
    Route::get('/admin/events/{slug}/edit', 'Admin\EvenementController@edit')->name('show-event-to-edit');
    Route::put('/admin/events/{slug}/update', 'Admin\EvenementController@update')->name('edit-one-event');
    Route::delete('/admin/events/{slug}', 'Admin\EvenementController@destroy')->name('remove-one-event');



});
