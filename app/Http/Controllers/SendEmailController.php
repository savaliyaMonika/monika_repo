<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\NotifyMail;
use App\Models\User;

class SendEmailController extends Controller
{
    public function index(){
        $details = [
            'subject'=>'Mail for Testing',
            "title"=>'Mail for Testing',
            "body"=>"Hello User, <br> <p>This is testing mail</p>"
        ];
        Mail::to('monika.savaliya@logisticinfotech.co.in')->send(new NotifyMail($details));

        if (Mail::failures()) {
             return 'Sorry! Please try again latter';
        }else{
             return 'Great! Successfully send in your mail';
           }
    }
    public function observerCreate(){
        $user = User::create([
            'name' => 'Platinum2',
            'email' => 'platinum211@gmail.com',
            'password'=>Hash::make('platinum@123'),
            'user_type'=>'employee'
        ]);
       // dd($user);
    }
   public function observerdelete(){
            $user = User::find('6');
            $user->delete();
   }
}
