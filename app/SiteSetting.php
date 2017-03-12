<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
  //protected $table = "tablename";
  protected $fillable = [
      'slug', 'namesetting', 'type','value',
  ];
}
