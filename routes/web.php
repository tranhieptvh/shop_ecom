<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    return redirect()->route('/admin');
})->name('/');

//Language Change
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['en', 'de', 'es', 'fr', 'pt', 'cn', 'ae'])) {
        abort(400);
    }
    Session()->put('locale', $locale);
    Session::get('locale');
    return redirect()->back();
})->name('lang');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard.index');
    })->name('/admin');

    Route::get('login', 'Admin\AuthController@index');
    Route::post('login', 'Admin\AuthController@login');
    Route::get('logout', 'Admin\AuthController@logout');

    Route::group(['middleware' => ['auth.admin']], function() {
        Route::prefix('dashboard')->group(function () {
            Route::view('/', 'admin.dashboard.index')->name('admin.dashboard.index');
        });

        Route::prefix('category')->group(function () {
            Route::view('/', 'admin.category.index')->name('admin.category.index');
        });

        Route::prefix('product')->group(function () {
            Route::view('/', 'admin.product.index')->name('admin.product.index');
        });
    });
});

Route::prefix('dashboard')->group(function () {
    Route::view('index', 'dashboard.index')->name('index');
    Route::view('dashboard-02', 'dashboard.dashboard-02')->name('dashboard-02');
});

Route::prefix('widgets')->group(function () {
    Route::view('general-widget', 'widgets.general-widget')->name('general-widget');
    Route::view('chart-widget', 'widgets.chart-widget')->name('chart-widget');
});

Route::prefix('page-layouts')->group(function () {
    Route::view('box-layout', 'page-layout.box-layout')->name('box-layout');
    Route::view('layout-rtl', 'page-layout.layout-rtl')->name('layout-rtl');
    Route::view('layout-dark', 'page-layout.layout-dark')->name('layout-dark');
    Route::view('hide-on-scroll', 'page-layout.hide-on-scroll')->name('hide-on-scroll');
    Route::view('footer-light', 'page-layout.footer-light')->name('footer-light');
    Route::view('footer-dark', 'page-layout.footer-dark')->name('footer-dark');
    Route::view('footer-fixed', 'page-layout.footer-fixed')->name('footer-fixed');
});

Route::prefix('project')->group(function () {
    Route::view('projects', 'project.projects')->name('projects');
    Route::view('projectcreate', 'project.projectcreate')->name('projectcreate');
});

Route::view('file-manager', 'file-manager')->name('file-manager');
Route::view('kanban', 'kanban')->name('kanban');

Route::prefix('ecommerce')->group(function () {
    Route::view('product', 'apps.product')->name('product');
    Route::view('product-page', 'apps.product-page')->name('product-page');
    Route::view('list-products', 'apps.list-products')->name('list-products');
    Route::view('payment-details', 'apps.payment-details')->name('payment-details');
    Route::view('order-history', 'apps.order-history')->name('order-history');
    Route::view('invoice-template', 'apps.invoice-template')->name('invoice-template');
    Route::view('cart', 'apps.cart')->name('cart');
    Route::view('list-wish', 'apps.list-wish')->name('list-wish');
    Route::view('checkout', 'apps.checkout')->name('checkout');
    Route::view('pricing', 'apps.pricing')->name('pricing');
});

Route::prefix('email')->group(function () {
    Route::view('email-application', 'apps.email-application')->name('email-application');
    Route::view('email-compose', 'apps.email-compose')->name('email-compose');
});

Route::prefix('chat')->group(function () {
    Route::view('chat', 'apps.chat')->name('chat');
    Route::view('chat-video', 'apps.chat-video')->name('chat-video');
});

Route::prefix('users')->group(function () {
    Route::view('user-profile', 'apps.user-profile')->name('user-profile');
    Route::view('edit-profile', 'apps.edit-profile')->name('edit-profile');
    Route::view('user-cards', 'apps.user-cards')->name('user-cards');
});


Route::view('bookmark', 'apps.bookmark')->name('bookmark');
Route::view('contacts', 'apps.contacts')->name('contacts');
Route::view('task', 'apps.task')->name('task');
Route::view('calendar-basic', 'apps.calendar-basic')->name('calendar-basic');
Route::view('social-app', 'apps.social-app')->name('social-app');
Route::view('to-do', 'apps.to-do')->name('to-do');
Route::view('search', 'apps.search')->name('search');

Route::prefix('ui-kits')->group(function () {
    Route::view('state-color', 'ui-kits.state-color')->name('state-color');
    Route::view('typography', 'ui-kits.typography')->name('typography');
    Route::view('avatars', 'ui-kits.avatars')->name('avatars');
    Route::view('helper-classes', 'ui-kits.helper-classes')->name('helper-classes');
    Route::view('grid', 'ui-kits.grid')->name('grid');
    Route::view('tag-pills', 'ui-kits.tag-pills')->name('tag-pills');
    Route::view('progress-bar', 'ui-kits.progress-bar')->name('progress-bar');
    Route::view('modal', 'ui-kits.modal')->name('modal');
    Route::view('alert', 'ui-kits.alert')->name('alert');
    Route::view('popover', 'ui-kits.popover')->name('popover');
    Route::view('tooltip', 'ui-kits.tooltip')->name('tooltip');
    Route::view('loader', 'ui-kits.loader')->name('loader');
    Route::view('dropdown', 'ui-kits.dropdown')->name('dropdown');
    Route::view('accordion', 'ui-kits.accordion')->name('accordion');
    Route::view('tab-bootstrap', 'ui-kits.tab-bootstrap')->name('tab-bootstrap');
    Route::view('tab-material', 'ui-kits.tab-material')->name('tab-material');
    Route::view('box-shadow', 'ui-kits.box-shadow')->name('box-shadow');
    Route::view('list', 'ui-kits.list')->name('list');
});

Route::prefix('bonus-ui')->group(function () {
    Route::view('scrollable', 'bonus-ui.scrollable')->name('scrollable');
    Route::view('tree', 'bonus-ui.tree')->name('tree');
    Route::view('bootstrap-notify', 'bonus-ui.bootstrap-notify')->name('bootstrap-notify');
    Route::view('rating', 'bonus-ui.rating')->name('rating');
    Route::view('dropzone', 'bonus-ui.dropzone')->name('dropzone');
    Route::view('tour', 'bonus-ui.tour')->name('tour');
    Route::view('sweet-alert2', 'bonus-ui.sweet-alert2')->name('sweet-alert2');
    Route::view('modal-animated', 'bonus-ui.modal-animated')->name('modal-animated');
    Route::view('owl-carousel', 'bonus-ui.owl-carousel')->name('owl-carousel');
    Route::view('ribbons', 'bonus-ui.ribbons')->name('ribbons');
    Route::view('pagination', 'bonus-ui.pagination')->name('pagination');
    Route::view('breadcrumb', 'bonus-ui.breadcrumb')->name('breadcrumb');
    Route::view('range-slider', 'bonus-ui.range-slider')->name('range-slider');
    Route::view('image-cropper', 'bonus-ui.image-cropper')->name('image-cropper');
    Route::view('sticky', 'bonus-ui.sticky')->name('sticky');
    Route::view('basic-card', 'bonus-ui.basic-card')->name('basic-card');
    Route::view('creative-card', 'bonus-ui.creative-card')->name('creative-card');
    Route::view('tabbed-card', 'bonus-ui.tabbed-card')->name('tabbed-card');
    Route::view('dragable-card', 'bonus-ui.dragable-card')->name('dragable-card');
    Route::view('timeline-v-1', 'bonus-ui.timeline-v-1')->name('timeline-v-1');
    Route::view('timeline-v-2', 'bonus-ui.timeline-v-2')->name('timeline-v-2');
    Route::view('timeline-small', 'bonus-ui.timeline-small')->name('timeline-small');
});

Route::prefix('builders')->group(function () {
    Route::view('form-builder-1', 'builders.form-builder-1')->name('form-builder-1');
    Route::view('form-builder-2', 'builders.form-builder-2')->name('form-builder-2');
    Route::view('pagebuild', 'builders.pagebuild')->name('pagebuild');
    Route::view('button-builder', 'builders.button-builder')->name('button-builder');
});

Route::prefix('animation')->group(function () {
    Route::view('animate', 'animation.animate')->name('animate');
    Route::view('scroll-reval', 'animation.scroll-reval')->name('scroll-reval');
    Route::view('aos', 'animation.aos')->name('aos');
    Route::view('tilt', 'animation.tilt')->name('tilt');
    Route::view('wow', 'animation.wow')->name('wow');
});


Route::prefix('icons')->group(function () {
    Route::view('flag-icon', 'icons.flag-icon')->name('flag-icon');
    Route::view('font-awesome', 'icons.font-awesome')->name('font-awesome');
    Route::view('ico-icon', 'icons.ico-icon')->name('ico-icon');
    Route::view('themify-icon', 'icons.themify-icon')->name('themify-icon');
    Route::view('feather-icon', 'icons.feather-icon')->name('feather-icon');
    Route::view('whether-icon', 'icons.whether-icon')->name('whether-icon');
    Route::view('simple-line-icon', 'icons.simple-line-icon')->name('simple-line-icon');
    Route::view('material-design-icon', 'icons.material-design-icon')->name('material-design-icon');
    Route::view('pe7-icon', 'icons.pe7-icon')->name('pe7-icon');
    Route::view('typicons-icon', 'icons.typicons-icon')->name('typicons-icon');
    Route::view('ionic-icon', 'icons.ionic-icon')->name('ionic-icon');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
