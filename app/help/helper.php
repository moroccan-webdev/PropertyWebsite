<?php

use App\SiteSetting;

  function getSetting($settingname = 'thamsup')
  {
    return SiteSetting::where('namesetting', $settingname)->get()[0]->value;
  }

  function bu_type()
  {
    $array = [
      'Appartment','Land','House',
    ];
    return $array;
  }

  function bu_rent()
  {
    $array = [
      'Rent','Sell',
    ];
    return $array;
  }

  function bu_status()
  {
    $array = [
      'Not Active','Active',
    ];
    return $array;
  }

  function roomnumber()
  {
    $array = [];
    for($i = 2; $i<=40; $i++){
      $array[$i] = $i;
    }
    return $array;
  }

  function bu_place()
  {
    $array = [
      "1" => "Fes",
      "2" => "Tanger",
      "3" => "Tetouan",
      "4" => "Casa",
      "5" => "Oujda",
      "6" => "Layoun",
      "7" => "Ouazzane",
      "8" => "Meknes",
      "9" => "Merakech",
      "10" => "Tiznit",
    ];

    return $array;
  }

  function searchnameFiled()
  {
    return [
      'bu_price'  => 'price',
      'bu_place'  => 'place',
      'rooms'     => 'rooms',
      'bu_type'   => 'type',
      'bu_rent'   => 'rent',
      'bu_square' => 'square',
      'bu_price_from' => 'price from',
      'bu_price_to' => 'price to',
    ];
  }
