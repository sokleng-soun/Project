<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
    	$data['products'] = Product::all();
    	return view('admin.products.index', $data);
    }

    public function add()
    {
    	$data['categories'] = Category::all();
    	return view('admin.products.add', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request,[
            'sku'           => 'required',
            'name'          => 'required',
            'regular_price' => 'required',
            'total_stock'   => 'required',
            'category_id'   => 'required',
        ]);

        $params = $request->all();
        $params['slug'] = str_slug($request->name);

        $product = Product::create($params);

        if ($product && $files = $request->file('image')) {
            foreach ($files as $key => $file) {
                $product_image             = new ProductImage;
                $product_image->product_id = $product->id;
                
                $file_name                 = date('Ymd') .'_'.time().rand(0,1000). '.' . $file->getClientOriginalExtension();
                $path                      = public_path('backend/uploads/product_images').'/';
                if (!is_dir($path)){
                    mkdir($path);
                }
                $file->move($path, $file_name);

                $product_image->image      = $file_name;                
                $product_image->save();
            }
        }

        return redirect()->back()->with([ 'type' => 'success', 'message' => 'Product has been saved successfully']);
    }

    public function edit($slug)
    {
        $data['editData'] = Product::where('slug',$slug)->firstOrFail();

        $data['categories'] = Category::all();
        return view('admin.products.edit', $data);
    }

    public function update(Request $request, $slug)
    {
        // dd($request->all());
        $validateData = $this->validate($request,[
            'sku'           => 'required',
            'name'          => 'required',
            'regular_price' => 'required',
            'total_stock'   => 'required',
            'category_id'   => 'required',
        ]);

        $params         = $request->all();
        $params['slug'] = str_slug($request->name);
        
        $product        = Product::where('slug',$slug)->first();
        $product->update($params);

        if ($files = $request->file('image')) {
            foreach ($files as $key => $file) {
                $product_image             = new ProductImage;
                $product_image->product_id = $product->id;
                
                $file_name                 = date('Ymd') .'_'.time().rand(0,1000). '.' . $file->getClientOriginalExtension();
                $path                      = public_path('backend/uploads/product_images').'/';
                if (!is_dir($path)){
                    mkdir($path);
                }
                $file->move($path, $file_name);

                $product_image->image      = $file_name;                
                $product_image->save();
            }
        }

        
        return redirect()->route('admin.product.edit',$product->slug)->with([ 'type' => 'success', 'message' => 'Product has been updated successfully']);
    }

    public function deleteImage(Request $request)
    {
        $image_ids = $request->image_id;
        foreach ($image_ids as $key => $id) {
            $product_image = ProductImage::find($id);
            @unlink('backend/uploads/product_images'.'/'.$product_image->image);
            $product_image->delete();
        }
    }

    public function delete(Request $request)
    {
        Product::where('slug', $request->slug)->delete();
        return redirect()->back()->with([ 'type' => 'success', 'message' => 'Product has been deleted successfully']);
    }




    
}
