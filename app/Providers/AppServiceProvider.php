<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Prevent lazy loading (di local/development aja)
        if (app()->environment('local')) {
            Model::preventLazyLoading();
        }

        Gate::define('seller', function (User $user) {
            return in_array($user->role, ['admin', 'seller']);
        });

        // View::composer('*', function ($view) {
        //     $cart = session()->get('cart', []); // atau dari cookie
        //     $totalQty = !empty($cart) ? array_sum(array_column($cart, 'qty')) : 0;
        //     $view->with('totalQty', $totalQty);
        // });
    }
}
