<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): Factory|View
    {
        return view('users.index');
    }

    public function create(): Factory|View
    {
        return view('users.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('users.index');
    }

    public function edit(User $user): Factory|View
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(UpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());
        return redirect()->route('users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
