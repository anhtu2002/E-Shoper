<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Cart;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $numberCart = 0;
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $numberCart = Cart::where('user_id', $userId)->count();
        }
        // route display filter
        $routesWithFilter = [
            '/home',
            '/filter',
            '/search',
        ];
        $url = request()->url();
        $showFilter = false;
        foreach ($routesWithFilter as $route) {
            if (strpos($url,$route) !== false) {
                $showFilter = true;
                break;
            }
        }
        $routesWithBanner = [
            '/home',
            '/filter',
            '/search',
            '/detail',
        ];
        $showBanner = false;
        foreach ($routesWithBanner as $route) {
            if (strpos($url, $route) !== false) {
                $showBanner = true;
                break;
            }
        }

        view()->share([
            'showFilter' => $showFilter,
            'showBanner' => $showBanner,
            'numberCart' => $numberCart,
        ]);

        return $next($request);
    }
}
