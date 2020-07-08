<?php

namespace App\Facades;


class Constant
{
  public function setting()
  {
    return \DB::table('settings')->where('id', 1)->first();
  }

  public function categories()
  {
    return \App\Category::all();
  }
}
