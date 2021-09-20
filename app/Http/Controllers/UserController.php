<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        if(auth()->user()->role_id == 1) {

            $users = User::paginate(4);
            return view('admin.users.index', compact('users'));
        } else if (auth()->user()->role_id == 2){
            $users = User::where('role_id', '3')->paginate(4);
            return view('admin.users.index', compact('users'));
        } else {
            return abort(403);
        }
    }

    public function create() {
        $roles = Role::get();
        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store() {
        $this->validateRequest();
        request()->validate([
            'email' => 'unique:users,email'
        ]);
        $users = request()->all();
        $avatar = request()->file('avatar');
        if($avatar) {
            $users['avatar'] = $avatar->store("images/users");
        } else {
            $users['avatar'] = "images/users/avatar.png";
        }

        $users['password'] = Hash::make('password');
        User::create($users);

        session()->flash('success','The User was Added');
        return redirect('/users');
    }

    public function edit(User $user) {
        if (auth()->user()->role_id == 2 && $user->role_id == 3) {
            $roles = Role::get();
            return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
        } else if(auth()->user()->role_id == 2 && $user->role_id !== 3) {  
            return abort(403);
        } else if(auth()->user()->role_id == 1) {
            $roles = Role::get();
            return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
        }
    }

    public function update(User $user) {
        $this->validateRequest();
        $users = request()->all();
        $avatar = request()->file('avatar');
        
        if($avatar) {
            \Storage::delete($user->avatar);
            $users['avatar'] = $avatar->store("images/users");
        }
        
        $user->update($users);

        session()->flash('success','The User was Added');
        return redirect('/users');
    }

    public function delete(User $user) {
        $user->delete();

        session()->flash('success','The User was Deleted');
        return redirect('/users');

        if (auth()->user()->role_id == 2 && $user->role_id == 3) {
            $user->delete();

            session()->flash('success','The User was Deleted');
            return redirect('/users');
        } else if(auth()->user()->role_id == 2 && $user->role_id !== 3) {  
            return abort(403);
        } else if(auth()->user()->role_id == 1) {
            $user->delete();

            session()->flash('success','The User was Deleted');
            return redirect('/users');
        }
    }

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'role_id' => 'required',
        ]);
    }
}
