<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use App\product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        $product = DB::table('products')->get();
        return view('product.index',compact('product'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $product = array();
        $product['product_name'] = $request->product_name;
        $product['product_code'] = $request->product_code;
        $product['details'] = $request->details;
        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H-s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $product = $request->file('logo');
            $data = DB::table('products')->insert($product);
            return redirect()->route('product.index')->with('success','Product Created Successfully');

        }
    }
}
