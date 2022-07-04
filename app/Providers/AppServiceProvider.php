<?php

namespace App\Providers;

use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CategoryRepository $categoryRepository, CartRepository $cartRepository)
    {
        $categories_menu = $categoryRepository->getBuilder()->where('parent_id', 0)->orderBy('ordering')->get();
        foreach ($categories_menu as $category) {
            $child = $categoryRepository->getBuilder()->where('parent_id', $category->id)->orderBy('ordering')->get();
            $category->child = $child;
            foreach ($child as $item) {
                $child = $categoryRepository->getBuilder()->where('parent_id', $item->id)->orderBy('ordering')->get();
                $item->child = $child;
            }
        }
        View::share('categories_menu', $categories_menu);

        view()->composer('*', function($view) use($cartRepository) {
            if (Auth::check()) {
                $total_quantity = 0;
                $carts = $cartRepository->getBuilder()->where('user_id', Auth::user()->id)->where('is_completed', 0)->get();
                if ($carts->count() > 0) {
                    foreach($carts as $cart) {
                        $total_quantity += $cart->quantity;
                    }
                }

                $view->with('total_cart_quantity', $total_quantity);
            } else {
                if (session('total_quantity')) {
                    $view->with('total_cart_quantity', session('total_quantity'));
                } else {
                    $view->with('total_cart_quantity', 0);
                }
            }
        });

    }
}
