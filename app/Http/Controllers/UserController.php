<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $name = request()->input('name');
        $family = request()->input('family');
        $user = ["name" => $name, "family" => $family];
        $json_user = json_encode($user);

        file_put_contents("users.json", $json_user);
        return "User successfully created";
    }

    public function edit()
    {
        $file_data = file_get_contents("users.json");
        $user = json_decode($file_data);

        return view('edit', ['user' => $user]);
    }

    public function update()
    {
        $name = request()->input('name');
        $family = request()->input('family');

        $user = ["name" => $name, "family" => $family];
        $json_user = json_encode($user);

        file_put_contents("users.json", $json_user);

        return "User successfully Updated";
    }
}
