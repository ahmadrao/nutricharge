<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use App\Review;
use App\Http\Requests\OrdersRequest;
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
        $categories = Category::all();
        $products = Product::paginate(5);
        return view('front.home', compact('products', 'categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $categories = Category::all();
        $products = Product::search($searchTerm)->get();
        return view('front.home', compact('products', 'searchTerm', 'categories'));
    }

    

    public function store(OrdersRequest $request)
    {
        Order::create($request->all());

        return back();
    }

    public function review(Request $request)
    {
        Review::create($request->all());
        return back();
    }
}
