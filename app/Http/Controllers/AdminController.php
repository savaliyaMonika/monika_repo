<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->data = [];
        // $this->middleware('auth');
    }

    public function index()
    {
    }
    public function userList(Request $request)
    {
        return view('admin.user');
    }
    public function getUserData(Request $request)
    {
        $configuration = User::select('*');
        // $configuration->where('user_type','admin');
        return Datatables::of($configuration)->make(true);
    }
    public function addUser(Request $request)
    {
        return view('admin/addUser', $this->data);
    }
    public function insertUser(UserRequest $request)
    {
       $request->all();
       $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->user_type = $request->input('user');
        $user->password = Hash::make($request->input('password'));
        $user->save();
      return redirect()->route('/admin/user')->with('success', 'Success Fully Insterted');
    }
    public function editUserForm(Request $request){
        $this->data['row']=User::find($request->id);
        return view('admin/editUser', $this->data);
    }
    public function editUser(Request $request){
        $request->all();
     $user = User::find($request->id);
     $user->name = $request->input('name');
     $user->email = $request->input('email');
     $user->user_type = $request->input('user');
     $user->update();
        return redirect()->route('/admin/user')->with('success', 'Success Fully Updated');
    }
    public function deleteUserData(Request $request){
        $user = User::find($request->id);
        $user->delete();
      return redirect()->route('/admin/user')->with('success', 'Success Fully Deletedddddd');
    }
}
