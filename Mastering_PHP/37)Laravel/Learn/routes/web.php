<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;

use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use App\User;

 // For Email
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/name', function () {
    return "Mahmud";
});


Route::post('/say', function(Request $request)
{
    $all = $request->all();
    var_dump($all);
    echo "Hi {$all['name']} {$all['age']}";

});


Route::get('/contact/{value}', function ($value) {
    return view('home',[
        'name' => $value,
        'age' => 30,

    ]);
});

 //____________________   Eloquent Relationship Routes _______________
   
    // ..................... One to one ............................
    Route::get('phoneInfo','PhoneController@phoneInfo');
    Route::get('userInfo','UserController@userInfo');
    Route::get('userPhone','UserController@userPhone');



    //...................... One to many  .........................
    Route::get('allPost','PostController@allPost');
   
    //...................... Many to many .........................
    Route::get('employeeRoles','EmployeeController@employeeRoles');
    Route::get('rolesToEmployee','RoleController@rolesToEmployee');




Route::get('cacheInfo','StudentController@cacheInfo');
Route::get('cookieInfo','StudentController@cookieInfo');
Route::get('sessionInfo','StudentController@sessionInfo');





Route::get('contact','StudentController@contact');
Route::get('info','StudentController@info');

Route::get('allStudent','StudentController@allStudent');
Route::get('showStudent','StudentController@showStudent');



Route::get('test','StudentController@test')->name('test');

Route::get('userInfoSave','UserController@userInfoSave');
Route::get('userInfoFind','UserController@userInfoFind');
Route::get('userInfoUpdate','UserController@userInfoUpdate');

Route::get('redisTest','StudentController@redisTest');

Route::get('cacheTest','StudentController@cacheTest');
Route::get('notificationMail','UserController@notificationMail');

Route::get('PostProcess','UserController@PostProcess');


//.........................    Email Notification ........................
Route::get('/sentEmailNotification', function(){

    $info = [
        'name' => 'Mahmud',
        'age' => 24,
        'email' => 'mahmud@gmail.com'
    ];

    $users = User::all();

    // Way 1: Using The Notifiable Trait | Single mail sent
     // $user->notify(new EmailNotification($info));

    // Way 2: Using The Notification Facade & Multipul mail sent
        foreach($users as $user)
        {
            Notification::send($user, new EmailNotification($info));
        }
    });
    
    // ...................   Email ...........................
    Route::get('sendEmail', function(){

    $mailData = [
        "name" => "Mahmud Hosen.",
        "email" => "mahmud@gmail.com",
        "age" => 24

    ];
    // Way: 1
    // Mail::to("hello@example.com")->send(new TestEmail($mailData));

    //Or Way: 2
    Mail::send('email.email2', $mailData, function($mail) use ($mailData){
        $mail->from($mailData['email'], $mailData['name'])
             ->to('kamal@gmail.com')
             ->subject("Test Email");

    });

    dd("Mail Sent Successfully!");
   });































