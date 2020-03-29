<?php

namespace App\Http\Controllers;

use App\VideoCategory;
use App\Http\Requests\VideoCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = VideoCategory::all();
        return view('admin.videos.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.videos.categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCategoryRequest $request)
    {
        VideoCategory::create($request->all());
        return redirect('/admin/videos/categories');
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
        $category = VideoCategory::findOrFail($id);
        return view('admin.videos.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoCategoryRequest $request, $id)
    {
        $category = VideoCategory::findOrFail($id);
        $category->whereId($id)->first()->update($request->all());
        return redirect('/admin/videos/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VideoCategory::whereId($id)->delete();
        Session::flash('category_deleted', 'VideoCategory Has Been Deleted Successfully');
        return redirect('/admin/videos/categories');
    }
}
