<?php

namespace App\Http\Controllers;

use App\Models\Product as ModelsProduct;
use Illuminate\Http\Request;
use App\Models\product;
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
        $product = new product;
        $product->product_name = $request->product_name;
        $product->product_code = $request->product_code;
        $product->details = $request->details;
        // $product = $request->file('logo');
        $product->save();

        // return view
        return redirect()->route('product.index')->with('success','Product Created Successfully');
        }
        public function Edit($id){
            $product = DB::table('products')->where('id',$id)->first();
            return view('product.edit',compact('product'));
        }
        public function Update(Request $request, $id){
            $product = product::find($id);
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->details = $request->details;
            // $product = $request->file('logo');
            $product->update();

            // return view
            return redirect()->route('product.index')->with('success','Product Update Successfully');
        }
        public function Delete($id){
            // $product = DB::table('products')->where('id', $id)->first();
            $product = product::find($id);
            $product->delete();
            return redirect()->route('product.index')->with('success','Product Delete Successfully');

        }
    }

