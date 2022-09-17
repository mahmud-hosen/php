<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Notifications\VerifyEmail;
use\App\Events\PostProcessed;
use Mail;


class UserController extends Controller
{
     function userInfo()
    {
        return User::with('phone')->get();
    }

    
    public function userInfoSave()
    {
        $user = new User();
        $user->name = "moly";
        $user->age = "30";
        $user->email = "moly@gmail.com";
        $user->save();
        if($user)
        {
            echo "Data Insert";
        }
    }

    public function userInfoFind()
    {
        echo User::find(4);
    }
     public function userInfoUpdate()
    {
        $user = User::find(4);
        $user->name = "Joly";
        $user->update();
    }

    public function notificationMail()
    {
        $user = User::create([
            'name' => 'Mahmud',
            'age' => 23,
            'email' => 'mahmudhossain582@gmail.com',
            'email' => 'mahmudhossain582@gmail.com',

        ]);
        $user->notify(new VerifyEmail($user));
    }

    // Event calling 
    public function PostProcess()
    {
        $edata = [
            'title' => 'Post Data Process',
            'name' => 'Mahmud',
        ];

         


        event(new PostProcessed($edata));


    }

}
