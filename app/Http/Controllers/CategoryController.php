<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function index() {
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2){

            $categories = Category::paginate(4);
            return view('admin.categories.index', compact('categories'));
        } else {
            return abort(403);
        }
    }

    public function create() {
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {
            return view('admin.categories.create');
        } else {
            return abort(403);
        }
    }

    public function store() {
        $categories = $this->validateRequest();
        Category::create($categories);

        session()->flash('success','The Category was Created');
        return redirect('/categories');
    }

    public function edit(Category $category) {
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {  
            return view('admin.categories.edit', ['category' => $category]);
        } else {
            return abort(403);
        }
    }

    public function update(Category $category) {
        $data = $this->validateRequest();

        $category->update($data);

        session()->flash('success','The Category was Updated');
        return redirect('/categories');
    }

    public function delete(Category $category) {
        
        if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) {  
            $category->delete();

            session()->flash('success','The Category was Deleted');
            return redirect('/categories');
        } else {
            return abort(403);
        }
        
    }

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3'
        ]);
    }
}
