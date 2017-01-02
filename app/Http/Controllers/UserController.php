<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use App\Http\Requests\AddUserRequestAdmin;

class UserController extends Controller
{
    public function index()
    {
      $users = User::all();
      return view('admin.users.index',compact('users'));
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

  public function destroy($id)
  {
    //find the user which will be deleted
    $user = User::find($id);;

    //detete the item
    $user->delete();

    //create a session flash
    Session::flash('success','This client was successfully deleted !');


    //redirect to the index page
    return back();
  }

}
