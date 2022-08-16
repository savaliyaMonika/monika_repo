<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [];
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       // $this->data['result'] = db::table('users')->get();
        return view('home',$this->data);
    }
    public function simpleDataTable(){

        $this->data['result'] = db::table('users')->get();
        return view('simpleDataTable',$this->data);
    }
  /*  public function showYajraDataTable(){
        return view('userList',$this->data);
    } */
    public function getUserData(Request $request){
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
     
                           $btn = "<a href='updateUserForm?id=".$row->id."' class='edit btn btn-info btn-sm'>Edit</a> <a href='deleteUser?id=".$row->id."' class='edit btn btn-danger btn-sm'>Delete</a>";
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('userList');
    }
    public function updateUserForm(Request $request){
        $this->data['result'] =  User::find($request->id);
       
        return view('updateUser',$this->data);
    }
    public function updateUser(Request $request){
        $user = User::find($request->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->route('yajraDataTablelist')->with('status','User Updated Successfully..!!!!');
    }
    public function deleteUser(Request $request){
        //$user = User::destroy($request->id);
        $user =User::find($request->id);
        $user->delete();
        return redirect()->route('yajraDataTablelist')->with('status','User Delete Successfully..!!!!');
    }
}
