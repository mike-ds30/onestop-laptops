<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function display_all_brands() {
        App::setLocale(SiteSetting::find(1)->locale);
        $brands = Brand::all();
        return view('brands', ['brands' => $brands]);
    }

    public function display_brand_products(Request $req, $id) {
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
        $brand = Brand::find($id);
        $laptops = Laptop::where('brand_id', '=', $id)->where(function ($query) use ($req) {
            $query->where('type', 'LIKE', "%$req->search%")->orWhere('model', 'LIKE', "%$req->search%");
        })->when(!is_null($req->ram), function($query) use ($req) {
            $query->where('ram', '>=', $req->ram);
        })->when(!is_null($req->storage), function($query) use ($req) {
            $query->where('storage', '>=', $req->storage);
        })->when(!is_null($req->price), function($query) use ($req) {
            $query->where('price', '<=', $req->price);
        })->paginate(9)->appends(['search' => $req->search, 'ram' => $req->ram, 'storage' => $req->storage, 'price' => $req->price]);
        return view('brand_products', ['brand' => $brand, 'laptops' => $laptops]);
    }

    public function add_brand() {
        App::setLocale(SiteSetting::find(1)->locale);
        return view('add_brand');
    }

    public function insert_brand(Request $req) {
        App::setLocale(SiteSetting::find(1)->locale);
        $rules = [
            'name' => 'required',
            'description' => 'required|min:5',
            'logo' => 'required|file|image'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        $file = $req->file('logo');
        $extension = $file->getClientOriginalExtension();
        $file_name = time().'.'.$extension;
        $file->move('images', $file_name);
        Brand::insert([
            'name' => $req->name,
            'description' => $req->description,
            'logo' => $file_name
        ]);
        return redirect('/editbrand');
    }

    public function edit_brand_page() {
        App::setLocale(SiteSetting::find(1)->locale);
        $brands = Brand::all();
        return view('admin_brand', ['brands' => $brands]);
    }

    public function edit_brand($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $brand = Brand::find($id);
        return view('edit_brand', ['brand' => $brand]);
    }

    public function update_brand(Request $req, $id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $rules = [
            'description' => 'nullable|min:5',
            'logo' => 'nullable|file|image'
        ];
        $validator = Validator::make($req->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator);
        }
        if($req->filled('name')) {
            Brand::where('id', '=', $id)->update([
                'name' => $req->name
            ]);
        }
        if($req->filled('description')) {
            Brand::where('id', '=', $id)->update([
                'description' => $req->description
            ]);
        }
        if($req->hasFile('logo')) {
            $brand = Brand::find($id);
            File::delete(public_path('images/'.$brand->logo));
            $file = $req->file('logo');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            $file->move('images', $file_name);
            $brand->update([
                'logo' => $file_name
            ]);
        }
        return redirect('/editbrand');
    }

    public function delete_brand($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $brand = Brand::find($id);
        Brand::where('id', '=', $id)->delete();
        File::delete(public_path('images/'.$brand->logo));
        return redirect('/editbrand');
    }
}
