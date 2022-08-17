<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Mail\NotifyMail;

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
        return view('home', $this->data);
    }
    public function simpleDataTable()
    {

        $this->data['result'] = db::table('users')->get();
        return view('simpleDataTable', $this->data);
    }
    public function showYajraDataTable()
    {
        return view('userList', $this->data);
    }
    public function getUserData(Request $request)
    {

        $configuration = User::select('*');
        // $configuration->where('user_type','admin');
        return Datatables::of($configuration)->make(true);
    }

    public function updateUserForm(Request $request)
    {
        $this->data['result'] =  User::find($request->id);

        return view('updateUser', $this->data);
    }
    public function updateUser(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->update();
        return redirect()->route('yajraDataTable')->with('status', 'User Updated Successfully..!!!!');
    }
    public function deleteUser(Request $request)
    {
        //$user = User::destroy($request->id);
        $user = User::find($request->id);
        $user->delete();

        $details = [
            'subject'=>'Delete User',
            "title"=>'Mail for Testing',
            "body"=>"Hello ".$user->name.", <br> <p> You have Remove in application </p> <br><p> Thank you</p>"
        ];
        Mail::to('monika.savaliya@logisticinfotech.co.in')->send(new NotifyMail($details));

      /* Mail::to($user->email)->send(new NotifyMail($details));*/

        return redirect()->route('yajraDataTable')->with('status', 'User Delete Successfully..!!!!');
    }
}
