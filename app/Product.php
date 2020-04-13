<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
  protected $table = 'product';

  public function getSrcAttribute($value)
  {
    return Storage::url($value);
  }
}
