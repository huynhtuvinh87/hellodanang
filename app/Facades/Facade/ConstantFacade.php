<?php

namespace App\Facades\Facade;

use Illuminate\Support\Facades\Facade;

class ConstantFacade extends Facade
{

  protected static function getFacadeAccessor()
  {
    return 'constant';
  }
}
