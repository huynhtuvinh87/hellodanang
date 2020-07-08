<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
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
    $this->app->singleton('constant', function ($app) {
      return new \App\Facades\Constant();
    });
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    // fix for specific key too long error for MySQL v5.7.7 or lower
    Schema::defaultStringLength(191);

    if (!$this->app->runningInConsole()) {

      /**
       * Clear view cache first before doing upgrade.
       */
      if (Request::is('update')) {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
      }

      // SHARE TO ALL ROUTES
      $site_global_settings  = Setting::find(1);
      view()->share('site_global_settings', $site_global_settings);

      // set local to en
      if (empty($site_global_settings->setting_site_language)) {
        App::setlocale('en');
      } else {
        App::setlocale($site_global_settings->setting_site_language);
      }
    }
  }
}
