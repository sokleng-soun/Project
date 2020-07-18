<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['categories'] = Category::all();
        $data['new_products'] = Product::orderBy('created_at','desc')->limit(4)->get();
        // $data['new_products'] = Product::where('created_at', '>=', Carbon::now()->subDays(7))->orderBy('created_at','desc')->limit(3)->get();
        // dd($data['new_products']->toArray());
        return view('index',$data);
    }
    public function about()
    {
        return view('about');
    }
    public function codes()
    {
        return view('codes');
    }
    public function faq()
    {
        return view('faq');
    }
    public function icons()
    {
        return view('icons');
    }
    public function mail()
    {
        return view('mail');
    }
    public function products()
    {
        return view('products');
    }
    public function products1()
    {
        return view('products1');
    }
    public function products2()
    {
        return view('products2');
    }
    public function single()
    {
        return view('single');
    }
    
}
