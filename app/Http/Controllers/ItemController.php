<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Room;
use App\User;
use PDF;
use App\Exports\ItemExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {
        $items = Item::paginate(4);
        return view('admin.items.index', compact('items'));
    }

    public function create() {
        $users = User::get();
        $rooms = Room::get();
        $categories = Category::get();
        return view('admin.items.create', ['users' => $users, 'rooms' => $rooms, 'categories' => $categories]);
    }

    public function store() {
        $this->validateRequest();
        request()->validate([
            'image' => 'required'
        ]);
        $items = request()->all();
        $image = request()->file('image');
        if($image) {
            $items['image'] = $image->store("images/items");
        }
        
        $item = Item::create($items);
        $item->categories()->attach(request('category'));

        session()->flash('success','The Item was Added');
        return redirect('/items');
    }

    public function edit(Item $item) {
        $users = User::get();
        $rooms = Room::get();
        $categories = Category::get();
        return view('admin.items.edit', ['users' => $users, 'rooms' => $rooms, 'item' => $item, 'categories' => $categories]);
    }

    public function update(Item $item) {
        $this->validateRequest();
        $items = request()->all();
        $image = request()->file('image');
        
        if($image) {
            \Storage::delete($item->image);
            $items['image'] = $image->store("images/items");
        } 
        
        $item->update($items);
        $item->categories()->sync(request('category'));

        session()->flash('success','The Item was Updated');
        return redirect('/items');
    }

    public function delete(Item $item) {
        $item->categories()->detach();
        $item->delete();
        session()->flash('success','The Item was Deleted');
        return redirect('/items');
    }

    public function cetak_pdf()
    {
    	$items = Item::all();
 
    	$pdf = PDF::loadview('admin.items.items_pdf',['items'=>$items]);
    	return $pdf->download('laporan-barang-pdf.pdf');
    }

    public function export_excel()
	{
		return Excel::download(new ItemExport, 'laporan_data_barang.xlsx');
	}

    public function validateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'user_id' => 'required',
            'room_id' => 'required',
            'category' => 'required'
        ]);
    }
}
