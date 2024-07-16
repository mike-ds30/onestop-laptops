<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class LaptopController extends Controller
{
    public function display_all_products(Request $req) {
        App::setLocale(SiteSetting::find(1)->locale);
        $rules = [
            'search' => 'nullable',
            'ram' => 'nullable|integer|min:0',
            'storage' => 'nullable|integer|min:0',
            'price' => 'nullable|integer|min:0'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $laptops = Laptop::where(function ($query) use ($req) {
            $query->where('type', 'LIKE', "%$req->search%")->orWhere('model', 'LIKE', "%$req->search%");
        })->when(!is_null($req->ram), function($query) use ($req) {
            $query->where('ram', '>=', $req->ram);
        })->when(!is_null($req->storage), function($query) use ($req) {
            $query->where('storage', '>=', $req->storage);
        })->when(!is_null($req->price), function($query) use ($req) {
            $query->where('price', '<=', $req->price);
        })->paginate(9)->appends(['search' => $req->search, 'ram' => $req->ram, 'storage' => $req->storage, 'price' => $req->price]);
        return view('products', ['laptops' => $laptops]);
    }

    public function laptop_detail($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $laptop = Laptop::find($id);
        return view('product_detail', ['laptop' => $laptop]);
    }

    public function add_laptop() {
        App::setLocale(SiteSetting::find(1)->locale);
        $brands = Brand::all();
        return view('add_product', ['brands' => $brands]);
    }

    public function insert_laptop(Request $req) {
        App::setLocale(SiteSetting::find(1)->locale);
        $rules = [
            'type' => 'required|min:3',
            'model' => 'required|min:3',
            'processor' => 'required|min:3',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
            'image' => 'required|file|image'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $file = $req->file('image');
        $extension = $file->getClientOriginalExtension();
        $file_name = time().'.'.$extension;
        $file->move('images', $file_name);
        $brand = Brand::where('name', '=', $req->brand)->first();
        Laptop::insert([
            'brand_id' => $brand->id,
            'type' => $req->type,
            'model' => $req->model,
            'processor' => $req->processor,
            'ram' => $req->ram,
            'storage' => $req->storage,
            'price' => $req->price,
            'image' => $file_name
        ]);
        return redirect('/editproduct');
    }

    public function edit_laptop_page() {
        App::setLocale(SiteSetting::find(1)->locale);
        $laptops = Laptop::paginate(9);
        return view('admin_product', ['laptops' => $laptops]);
    }

    public function edit_laptop($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $brands = Brand::all();
        $laptop = Laptop::find($id);
        return view('edit_product', ['laptop' => $laptop, 'brands' => $brands]);
    }

    public function update_laptop(Request $req, $id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $rules = [
            'type' => 'nullable|min:3',
            'model' => 'nullable|min:3',
            'processor' => 'nullable|min:3',
            'ram' => 'nullable|integer|min:1',
            'storage' => 'nullable|integer|min:1',
            'price' => 'nullable|integer|min:1',
            'image' => 'nullable|file|image'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        if($req->filled('brand')) {
            $brand = Brand::where('name', '=', $req->brand)->first();
            Laptop::where('id', '=', $id)->update([
                'brand_id' => $brand->id
            ]);
        }
        if($req->filled('type')) {
            Laptop::where('id', '=', $id)->update([
                'type' => $req->type
            ]);
        }
        if($req->filled('model')) {
            Laptop::where('id', '=', $id)->update([
                'model' => $req->model
            ]);
        }
        if($req->filled('processor')) {
            Laptop::where('id', '=', $id)->update([
                'processor' => $req->processor
            ]);
        }
        if($req->filled('ram')) {
            Laptop::where('id', '=', $id)->update([
                'ram' => $req->ram
            ]);
        }
        if($req->filled('storage')) {
            Laptop::where('id', '=', $id)->update([
                'storage' => $req->storage
            ]);
        }
        if($req->filled('price')) {
            Laptop::where('id', '=', $id)->update([
                'price' => $req->price
            ]);
        }
        if($req->hasFile('image')) {
            $laptop = Laptop::find($id);
            File::delete(public_path('images/'.$laptop->image));
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images', $file_name);
            $laptop->update([
                'image' => $file_name
            ]);
        }
        return redirect('editproduct');
    }

    public function delete_laptop($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $laptop = Laptop::find($id);
        Laptop::where('id', '=', $id)->delete();
        File::delete(public_path('images/'.$laptop->image));
        return redirect('editproduct');
    }
}
