<?php

namespace App\Http\Controllers;

use App\Order;
use App\Review;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $ordersCount = Order::count();
        $reviewsCount   = Review::count();
        return view('admin.index', compact('productsCount', 'ordersCount', 'reviewsCount'));
    }
}
