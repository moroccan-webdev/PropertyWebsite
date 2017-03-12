<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Redirect;


class SiteSettingController extends Controller
{
    public function index(SiteSetting $sitesetting)
    {
      $sitesetting = SiteSetting::all();
      return view('admin.sitesetting.index', compact('sitesetting'));
    }

    public function store(Request $request, SiteSetting $sitesetting)
    {
      foreach(array_except($request->toArray(), ['_token','submit']) as $key=> $req)
      $sitesettingupdate = $sitesetting->where('namesetting', $key)->first();
      $sitesettingupdate->fill(['value' => $req])->save();
      return Redirect::back()->withFlashMessage('Done successfully');
    }

}
