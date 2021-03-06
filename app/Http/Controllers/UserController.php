<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Http\Request;
use Datatables;
use App\User;
use Session;
use App\Bu;



class UserController extends Controller
{
    public function index()
    {
      return view('admin.users.index');
    }

    public function create()
    {
      return view('admin.users.add');
    }

    protected function store(AddUserRequestAdmin $request, User $user)
    {
        $user->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect('/adminpanel/user')->withFlashMessage('The user has benn added successfully');
    }

    protected function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',compact('user'));
    }

    protected function update(Request $request,$id)
    {
      //validate the data
      $user = User::find($id);

      $this->validate($request, array(
        'name'            => 'required|max:255',
        'admin'           => '',
        'email'           => 'required|min:5|max:50|email',

          ));

      //save the data to the database
      $user = User::find($id);
      $user->password = bcrypt($request->password);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->admin = $request->admin;


      $user->save();
      //set flash data with success message
      Session::flash('success','The user was successfully updated !');

      //rediredct with flash data to posts.show
      return back();



/*
        $user = User::find($id);
        $user->fill($request->all())->save();
        return redirect->back()->withFlashMessage('The user has benn successfully updated');
        */
    }

    protected function UpdatePassword(Request $request,$id)
    {
        $user = User::find($id);

        $user->password = bcrypt($request->password);
        $user->password = $password;
        $user->save();
        //set flash data with success message
        Session::flash('success','The user was successfully updated !');
        return back();
    }
  /*  */

  public function destroy($id, User $user)
  {
    if($id !=1){
    $user = User::find($id)->delete();
    Bu::where('user_id',$id)->delete();
    Session::flash('success','This client was successfully deleted !');
    return back();
    }
    return redirect('/adminpanel/user')->withFlashMessage('unable to delete the administrator or root user');
  }

  public function anyData()
  {

    $users = User::all();
    return Datatables::of($users)
      ->editColumn('name', function ($model){
        return '<a href="'.url('/adminpanel/user/'.$model->id .'/edit').'">'.$model->name.'</a>';
      })
      ->editColumn('admin', function ($model){
        return $model->admin == 0 ?  '<span class = "badge badge-info">'.'guest'.'</span>' : '<span class = "badge badge-warning">'.'admin'.'</span>';
      })
      ->editColumn('control', function ($model){
        $all = '<a href="'.url('/adminpanel/user/'.$model->id .'/edit').'" class = "btn btn-info btn-circle"><i class ="fa fa-edit"></i></a>';
        if($model->id !=1){
          $all .= '<a href="'.url('/adminpanel/user/'.$model->id .'/delete').'" class = "btn btn-danger btn-circle"><i class ="fa fa-trash-o"></i></a>';
        }
        return $all;

      })
      ->make(true);

  }

}
