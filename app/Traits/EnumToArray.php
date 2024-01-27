<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait EnumToArray
{

  public static function names(): array
  {
  return array_column(self::cases(), 'name');
  }

  public static function values(): array
  {
  return array_column(self::cases(), 'value');
  }

  public static function array(): array
  {
    return array_combine(self::names(), self::values());
  }

  //getValues
  public static function getValues(): array
  {
    return array_column(self::cases(), 'value');
  }

}