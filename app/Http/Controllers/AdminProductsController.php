<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductGoal;
use App\VideoCategory;
use App\Http\Requests\ProductsCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Photo;
use App\Product;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $video_categories = VideoCategory::pluck('name', 'id');
        $product_goals = ProductGoal::all();;
        return view('admin.products.create', compact('categories', 'product_goals', 'video_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();

        $input['gender'] = implode(",", $input['gender']);
        $input['selected_product_goals'] = implode(",", $input['selected_product_goals']);
        $input['age_range'] = implode(",", $input['age_range']);

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user->products()->create($input);

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id');
        $video_categories = VideoCategory::pluck('name', 'id');
        $product_goals = ProductGoal::all();;
        $gender = explode(",", $product->gender);
        $age_range = explode(",", $product->age_range);
        $selected_product_goals = explode(",", $product->selected_product_goals);

        return view('admin.products.edit', compact('product', 'categories', 'gender', 'age_range', 'selected_product_goals', 'product_goals', 'video_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $input = $request->all();
        $input['gender'] = implode(",", $input['gender']);
        $input['age_range'] = implode(",", $input['age_range']);
        $input['selected_product_goals'] = implode(",", $input['selected_product_goals']);

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        Auth::user()->products()->whereId($id)->first()->update($input);
        return redirect('/admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        unlink(public_path() . $product->photo->file);
        $product->delete();
        Session::flash('product_deleted', 'Product has been deleted Successfully');
        return redirect('/admin/products');
    }






    public function product($slug)
    {
        $video_categories = VideoCategory::all();
        $nav_products  = Product::select('title', 'slug')->get();
        $product = Product::findBySlugOrFail($slug);

        // Product Related Videos
        $video_category_id = $product['video_category_id'];
        $related_videos = Video::where('video_category_id', '=', $video_category_id)->take(2)->get();



        $category_id = $product['category_id'];
        $related_products = Product::where('category_id', '=', $category_id)->where('slug', '!=', $slug)->get();
        $sidebar_products = Product::where('category_id', '!=', $category_id)->take(8)->get();


        $product['related_pics_ids'] = explode(",", $product['related_pics_ids']);
        $product['related_video_links'] = explode(",", $product['related_video_links']);
        $genders = explode(",", $product['gender']);
        $age_ranges = explode(",", $product['age_range']);
        $selected_product_goals = explode(",", $product['selected_product_goals']);


        $related_video_links = $product['related_video_links'];
        $length = count($related_video_links);

        // isset is very important otherwise it will through offset error
        for ($i = 0; $i < $length; $i++) {
            if (isset($related_video_links[$i])) {
                $videos[$i] = $related_video_links[$i];
            }
        }




        $related_pics_ids = $product['related_pics_ids'];

        // isset is very important otherwise it will through offset error
        for ($i = 0; $i < count($related_pics_ids); $i++) {
            if (isset($related_pics_ids[$i])) {
                $id = $related_pics_ids[$i];
                $pics[$i] = Photo::whereId($id)->first();
            }
        }


        $reviews = $product->reviews()->whereIsActive(1)->get();
        $categories = Category::all();

        return view('front.product', compact('product', 'reviews', 'categories', 'pics', 'videos', 'genders', 'age_ranges', 'selected_product_goals', 'related_products', 'sidebar_products', 'video_categories', 'related_videos', 'nav_products'));
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $products = Product::search($searchTerm)->get();
        return view('admin.products.index', compact('products', 'searchTerm'));
    }
}
