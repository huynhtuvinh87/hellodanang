<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap the application services.
   */
  public function boot()
  {
  }

  /**
   * Repositories Bindings.
   * Bind Every Repository to interface.
   */
  public function register()
  {

    $models = array(
      'Item',
      'Category',
      'User',
      'Setting',
    );

    foreach ($models as $model) {
      $this->app->bind("App\Contracts\{$model}Interface", "App\Repositories\{$model}Repository");
    }
  }
}
