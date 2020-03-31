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


    // store method for Receiving orders
    public function store(OrdersRequest $request)
    {
        Order::create($request->all());
        notify()->success("Your Order is Successfully Submitted", "Success", "topRight");
        return back();
    }

    public function review(Request $request)
    {
        Review::create($request->all());
        notify()->success("Your Review if successfully submitted", "Success", "topRight");
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
        notify()->success("Your Message is successfully Sent", "Success", "topRight");
        return view('front.contact', compact('video_categories'));
    }

    public function aboutUs()
    {
        $video_categories = VideoCategory::all();
        return view('front.about_us', compact('video_categories'));
    }

    public function faq()
    {
        $video_categories = VideoCategory::all();
        return view('front.frequently_asked_questions', compact('video_categories'));
    }
}
