<?php

use App\Admin\Controllers\AboutController;
use App\Admin\Controllers\BannerController;
use App\Admin\Controllers\BlogCategoryController;
use App\Admin\Controllers\BlogController;
use App\Admin\Controllers\BlogItemController;
use App\Admin\Controllers\BrandPageController;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\ContactController;
use App\Admin\Controllers\ContactFormController;
use App\Admin\Controllers\DynamicPageController;
use App\Admin\Controllers\HomePageController;
use App\Admin\Controllers\NavigationController;
use App\Admin\Controllers\NewsController;
use App\Admin\Controllers\NewsItemController;
use App\Admin\Controllers\ProductController;
use App\Admin\Controllers\ShopItemController;
use App\Admin\Controllers\ShopPageController;
use App\Admin\Controllers\SliderController;
use App\Admin\Controllers\SpecialController;
use App\Admin\Controllers\VacancyAdvantageController;
use App\Admin\Controllers\VacancyItemController;
use App\Admin\Controllers\VacancyPageController;
use App\Admin\Controllers\VacancySuccessController;
use Illuminate\Routing\Router;
use App\Admin\Controllers\BrandController;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('brands', BrandController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('products', ProductController::class);
    $router->resource('homes', HomePageController::class);
    $router->resource('abouts', AboutController::class);
    $router->resource('specials', SpecialController::class);
    $router->resource('navigations', NavigationController::class);
    $router->resource('blogs', BlogController::class);
    $router->resource('blog-items', BlogItemController::class);
    $router->resource('blog-categories', BlogCategoryController::class);
    $router->resource('news', NewsController::class);
    $router->resource('news-items', NewsItemController::class);
    $router->resource('contacts', ContactController::class);
    $router->resource('contact-forms', ContactFormController::class);
    $router->resource('sliders', SliderController::class);
    $router->resource('banners', BannerController::class);
    $router->resource('dynamic-pages', DynamicPageController::class);
    $router->resource('brand-pages', BrandPageController::class);
    $router->resource('shop-pages', ShopPageController::class);
    $router->resource('shop-items', ShopItemController::class);
    $router->resource('vacancy-pages', VacancyPageController::class);
    $router->resource('vacancy-items', VacancyItemController::class);
    $router->resource('vacancy-advantages', VacancyAdvantageController::class);
    $router->resource('vacancy-successes', VacancySuccessController::class);

});
