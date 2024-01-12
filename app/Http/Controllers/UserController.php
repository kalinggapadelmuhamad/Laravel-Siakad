<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type_menu  = 'users';
        $keyword    = $request->input('name');
        $users      = User::when($request->input('name'), function ($query, $name) {
            $query->where('name', 'like', '%' . $name . '%');
        })->orderBy('id', 'DESC')->paginate(10);

        $users->appends(['name' => $keyword]);

        return view('pages.users.index', compact(
            'type_menu',
            'users'
        ));
    }

    public function create(Request $request)
    {
        $type_menu  = 'users';

        return view('pages.users.create', compact(
            'type_menu'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return Redirect::route('user.index')->with('success', 'New user has been successfully added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(User $user)
    {
        $type_menu = 'users';
        return view('pages.users.edit', compact('type_menu', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $type_menu = 'users';
        $validate = $request->validated();
        $user->update($validate);

        return Redirect::route('user.index')->with('success', 'User has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('user.index')->with('success', 'User has been successfully delete.');
    }
}
