<?php

namespace App\Providers;

use App\Models\Company;
use Illuminate\Support\ServiceProvider;

use function PHPUnit\Framework\isNull;

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
   $company=Company::first();


   if(isset($company)){
        view()->share('companyname', $company['name']);
   }else{
    view()->share('companyname', 'Bike Rental');
   }

    }
}
