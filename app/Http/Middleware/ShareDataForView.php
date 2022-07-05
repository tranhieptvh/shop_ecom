<?php

namespace App\Http\Middleware;

use App\Repositories\CartRepository;
use App\Repositories\CategoryRepository;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ShareDataForView
{
    protected $cartRepository;
    protected $categoryRepository;
    public function __construct(CartRepository $cartRepository, CategoryRepository $categoryRepository)
    {
        $this->cartRepository = $cartRepository;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $total_quantity = 0;
            $carts = $this->cartRepository->getBuilder()->where('user_id', Auth::user()->id)->where('is_completed', 0)->get();
            if ($carts->count() > 0) {
                foreach($carts as $cart) {
                    $total_quantity += $cart->quantity;
                }
            }
        } else {
            if (Session::get('total_quantity')) {
                $total_quantity = Session::get('total_quantity');
            } else {
                $total_quantity = 0;
            }
        }
        View::share('total_cart_quantity', $total_quantity);

        $categories_menu = $this->categoryRepository->getBuilder()->where('parent_id', 0)->orderBy('ordering')->get();
        foreach ($categories_menu as $category) {
            $child = $this->categoryRepository->getBuilder()->where('parent_id', $category->id)->orderBy('ordering')->get();
            $category->child = $child;
            foreach ($child as $item) {
                $child = $this->categoryRepository->getBuilder()->where('parent_id', $item->id)->orderBy('ordering')->get();
                $item->child = $child;
            }
        }
        View::share('categories_menu', $categories_menu);
        return $next($request);
    }
}
