<?php

namespace App\Http\Controllers;

use App\Category;
use App\Review;
use App\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $productsCount = Product::count();
        $categoriesCount = Category::count();
        $reviewsCount   = Review::count();
        return view('admin.index', compact('productsCount', 'categoriesCount', 'reviewsCount'));
    }
}
