<?php

namespace App\Http\Controllers;

use App\Http\Requests\BuRequest;
use Illuminate\Http\Request;
use Datatables;
use Redirect;
use App\Bu;
use Auth;
use DB;


class BuController extends Controller
{
    public function index()
    {
      return view('admin.bu.index');
    }

    public function create()
    {
      return view('admin.bu.add');
    }

    public function store(BuRequest $buRequest, Bu $bu)
    {
      $user = Auth::user();
      $data = [
        'user_id'      => $user->id,
        'bu_name'      => $buRequest->bu_name,
        'bu_price'     => $buRequest->bu_price,
        'bu_rent'      => $buRequest->bu_rent,
        'bu_square'    => $buRequest->bu_square,
        'bu_type'      => $buRequest->bu_type,
        'bu_small_dis' => $buRequest->bu_small_dis,
        'bu_meta'      => $buRequest->bu_meta,
        'bu_longitude' => $buRequest->bu_longitude,
        'bu_latitude'  => $buRequest->bu_latitude,
        'bu_large_dis' => $buRequest->bu_large_dis,
        'bu_status'    => $buRequest->bu_status,
        'rooms'        => $buRequest->rooms,
      ];
      $bu->create($data);
      return Redirect('/adminpanel/bu')->withFlashMessage('Estate added successfully');
    }

    public function edit($id)
    {
      $bu = Bu::find($id);
      return view('admin.bu.edit',compact('bu'));
    }

    public function update($id, BuRequest $buRequest)
    {
      $bu = Bu::find($id);
      $bu->fill($buRequest->all())->save();
      return Redirect::back()->withFlashMessage('Estate added successfully');
    }

    public function destroy($id)
    {
      $bu = Bu::find($id)->delete();
      return Redirect::back()->withFlashMessage('Estate added successfully');
    }

    public function anyData(Bu $bu)
    {

      $bus = Bu::all();
      return Datatables::of($bus)
        ->editColumn('bu_name', function ($model){
          return '<a href="'.url('/adminpanel/bu/'.$model->id .'/edit').'">'.$model->bu_name.'</a>';
        })
        ->editColumn('bu_type', function ($model){
          $type = bu_type();
          return '<span class = "badge badge-info">'.$type[$model->bu_type].'</span>';
        })
        ->editColumn('bu_status', function ($model){
          return $model->bu_status == 0 ?  '<span class = "badge badge-info">'.'Not Active'.'</span>' : '<span class = "badge badge-warning">'.'Not Active'.'</span>';
        })
        ->editColumn('control', function ($model){
          $all = '<a href="'.url('/adminpanel/bu/'.$model->id .'/edit').'" class = "btn btn-info btn-circle"><i class ="fa fa-edit"></i></a>';

            $all .= '<a href="'.url('/adminpanel/bu/'.$model->id .'/delete').'" class = "btn btn-danger btn-circle"><i class ="fa fa-trash-o"></i></a>';

          return $all;

        })
        ->make(true);

    }

    public function showAllEnable(Bu $bu)
    {
      $buAll = Bu::where('bu_status', 1)->orderBy('id', 'desc')->paginate(2);
      return view('website.bu.all',compact('buAll'));
    }

    public function forRent(Bu $bu)
    {
      $buAll = Bu::where('bu_status', 1)->where('bu_rent', 0)->orderBy('id', 'desc')->paginate(6);
      return view('website.bu.all',compact('buAll'));
    }

    public function forBuy(Bu $bu)
    {
      $buAll = Bu::where('bu_status', 1)->where('bu_rent', 1)->orderBy('id', 'desc')->paginate(6);
      return view('website.bu.all',compact('buAll'));
    }

    public function showByType($type, Bu $bu)
    {
      if(in_array($type, ['0', '1', '2'])){
        $buAll = Bu::where('bu_status', 1)->where('bu_type', $type)->orderBy('id', 'desc')->paginate(6);
        return view('website.bu.all',compact('buAll'));
      }else{
        return Redirect::back();
      }
    }

    public function search(Request $request, Bu $bu)
    {
        //$max = $request->bu_price_to == '' ? '1000000' : $request->bu_price_to;
        //$min = $request->bu_price_from == '' ? '500' : $request->bu_price_from;
        //dd($max, $min);
        $requestAll = array_except($request->toArray(),['submit','_token','page']);
        $query = DB::table('bus')->select('*');
        $array = [];
        $cout = count($requestAll);
        $i = 0;
        foreach($requestAll as $key => $req){
          $i++;
          if($req != ''){
              if($key == 'bu_price_from' && $request->bu_price_to == ''){
                $query->where('bu_price', '>=' ,$req);
              }elseif($key == 'bu_price_to' && $request->bu_price_from == ''){
                $query->where('bu_price', '<=' ,$req);
              }else{
                if($key != 'bu_price_to' && $key != 'bu_price_from'){
                  $query->where($key, $req);
                }
              }
              $array[$key] = $req;
        }elseif ($cout == $i && $request->bu_price_to != '' && $request->bu_price_from != '') {
          $query->whereBetween('bu_price', [$request->bu_price_from ,$request->bu_price_to]);
          $array[$key] = $req;
        }
        }
        $buAll = $query->paginate(10);
        return view('website.bu.all',compact('buAll', 'array'));
    }

    public function ShowSingle($id, Bu $bu)
    {
      $buInfo = Bu::findOrFail($id);
      $some_rent = Bu::where('bu_rent', $buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
      $some_type = Bu::where('bu_type', $buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
      return view('website.bu.buinfo',compact('buInfo', 'some_rent', 'some_type'));
    }

}
