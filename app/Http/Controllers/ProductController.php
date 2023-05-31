<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $data = Product::orderBy('id', 'ASC')->paginate(10); 
        if(request()->keyword){
            $data = Product::orderBy('id', 'ASC')->search()->paginate(10); 
        }
        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $cats = Category::orderBy('id', 'ASC')->select('id', 'name')->get();
        return view('admin.product.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // if ($request->has('file_upload')) {
        //     $file = $request->file_upload;
        //     $ext = $file->extension();
        //     $file_name = date('dmyhms') . '-' . 'product' . '.' . $ext;
        //     $file->move(public_path('uploads'), $file_name);
        //     $request->merge(['image' =>  $file_name]);
        // }
        if (Product::create($request->all())) {
            return redirect()->route('product.index')->with('success', 'Tạo sản phẩm mới thành công.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        if($product->details()->count() > 0) {
            return redirect()->route('product.index')->with('error','Không thế xóa sản phẩm.');
        }
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công.');
    }
}
