<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Notifiable;
    protected $fillable = ['name','email'];


    // One to one relationship
    // If you want custom foreignkey Both relation(inverse) 2nd parametre will that name
     //Like   return $this->hasOne('App\Phone','u_id');
    
    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email;
 
        // Return name and email address...
        return [$this->email_address => $this->email];
    }
    
}

// class User extends Authenticatable
// {
//     use Notifiable;
// }
