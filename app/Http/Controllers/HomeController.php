<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\VideoCategory;
use App\Order;
use App\Review;
use App\Contact;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ContactRequest;
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
        $video_categories = VideoCategory::all();
        $products = Product::paginate(5);
        return view('front.home', compact('products', 'categories', 'video_categories'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $categories = Category::all();
        $products = Product::search($searchTerm)->get();
        $video_categories = VideoCategory::all();
        return view('front.home', compact('products', 'searchTerm', 'categories', 'video_categories'));
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

    public function showContactPage()
    {
        $video_categories = VideoCategory::all();
        return view('front.contact', compact('video_categories'));
    }

    public function submitContactPage(ContactRequest $request)
    {
        Contact::create($request->all());
        $video_categories = VideoCategory::all();
        return view('front.contact', compact('video_categories'));
    }

    public function aboutUs()
    {
        $video_categories = VideoCategory::all();
        return view('front.about_us', compact('video_categories'));
    }
}
