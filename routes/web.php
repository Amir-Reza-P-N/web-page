<?php

use Illuminate\Support\Facades\Route;

//Route::resource('users', \App\Http\Controllers\UserController::class);


Route::get('insert', function () {
    // Query Builder
    /*\Illuminate\Support\Facades\DB::
        table('users')
        ->insert([
        "name" => "ali",
        "email" => "t@t.com",
        "password" => bcrypt("test"),
        "created_at" => \Carbon\Carbon::now(),
        "updated_at" => \Carbon\Carbon::now()
    ]);*/

    // Eloquent
    \App\Models\User::create([
        "name" => "ali",
        "email" => "t@t.com",
        "password" => bcrypt("test")
    ]);
});

Route::get('get', function () {
    // Query Builder
    $user = \Illuminate\Support\Facades\DB::
        table('users')
        ->find(4);

//    dd($user);

    // Eloquent
    $user = \App\Models\User::find(4);
    return $user;
    dd($user);
});
