<?php

namespace App\Observers;

use App\Models\User;
use Mail;
use App\Mail\NotifyMail;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        dd($user);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
          $details = [
            'subject'=>'Delete User',
            "title"=>'Mail for Testing',
            "body"=>"Hello ".$user->name.", <br> <p> You have Remove in application  </p> <br><p></p><br><p> Thank you</p>"
        ];
          Mail::to('monika.savaliya@logisticinfotech.co.in')->queue(new NotifyMail($details));
          if (Mail::failures()) {
            return 'Sorry! Please try again latter';
       }else{
            return 'Great! Successfully send in your mail';
          }
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
