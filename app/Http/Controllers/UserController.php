<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::paginate(3);
        //$users = User::all();
        return view('Users.list', ['users' => $users])->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'min:5'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'address' => $request['address'],
            'password' => Hash::make($request['password']),
        ]);

        return to_route('Users.index')->with('success', 'User is created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return view('Users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        //dd($user);
        $user = User::find($id);
        return view('Users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id,],
            'address' => ['required', 'string', 'min:5'],
        ]);

        $name = $request['name'];
        $email = $request['email'];
        $address = $request['address'];

        $input = $request->all();

        $user->update($input);

        return to_route('Users.index')->with('success', 'User is updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //dd($user);
        $user = User::find($id);
        $user->delete();
        return to_route('Users.index')->with('success', 'User is deleted');
    }
}
