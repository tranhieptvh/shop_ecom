<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
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
    public function boot(CategoryRepository $categoryRepository)
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
    }
}
