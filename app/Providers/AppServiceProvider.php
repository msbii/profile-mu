<?php

namespace App\Providers;

use App\Models\Sejarah;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        //

        Paginator::useBootstrap();
        // Autentifikasi gates
        Gate::define('admin', function(User $user){
            return $user->is_admin;
        });

        // Mengirimkan data 'sejarah' ke semua view
        // view()->composer('dashboardPost/layouts/header', function ($view) {
        //     // $sejarah = Sejarah::where('category', 'sejarah')->get(); // Sesuaikan query
        //     $sejarah = Sejarah::all(); // Sesuaikan query
        //     $view->with('sejarah', $sejarah);
        // });

        view()->composer('dashboardPost/layouts/header', function ($view) {
            // Query hanya untuk data dengan kategori 'Muhammadiyah' atau 'Aisyiyah'
            $sejarah = Sejarah::where('title', 'like', '%Muhammadiyah%')
                ->orWhere('title', 'like', '%Aisyiyah%')
                ->get();
                
            // Mengirimkan data ke view
            $view->with('sejarah', $sejarah);
        });
        view()->composer('dashboardPost/layouts/footer', function ($view) {
            // Query hanya untuk data dengan kategori 'Muhammadiyah' atau 'Aisyiyah'
            $sejarah = Sejarah::where('title', 'like', '%Muhammadiyah%')
                ->orWhere('title', 'like', '%Aisyiyah%')
                ->get();
                
            // Mengirimkan data ke view
            $view->with('sejarah', $sejarah);
        });
    }
}
