<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        $roles = Role::paginate(4);
        return view('admin.roles.index', compact('roles'));
    }

    public function create() {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        return view('admin.roles.create');
    }

    public function store() {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        $roles = $this->validateRequest();
        Role::create($roles);

        session()->flash('success','The Role was Created');
        return redirect('/roles');
    }

    public function edit(Role $role) {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Role $role) {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        $data = $this->validateRequest();

        $role->update($data);

        session()->flash('success','The Role was Updated');
        return redirect('/roles');
    }

    public function delete(Role $role) {
        
        if(auth()->user()->role_id !== 1) return abort(403);
        $role->delete();

        session()->flash('success','The Role was Deleted');
        return redirect('/roles');
    }

    public function validateRequest() {
        return request()->validate([
            'role' => 'required|min:3|unique:roles,role'
        ]);
    }
}
