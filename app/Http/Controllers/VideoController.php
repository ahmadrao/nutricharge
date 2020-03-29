<?php

namespace App\Http\Controllers;

use App\Video;
use App\VideoCategory;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        $categories = VideoCategory::pluck('name', 'id');
        return view('admin.videos.index', compact('categories', 'videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        Video::create($request->all());
        return redirect('/admin/videos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, $id)
    {
        $video = Video::findOrFail($id);
        $video->whereId($id)->first()->update($request->all());
        return redirect('/admin/videos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::whereId($id)->delete();
        Session::flash('video_deleted', 'Video Has Been Deleted Successfully');
        return redirect('/admin/videos');
    }

    public function videos($slug)
    {
        $video_categories = VideoCategory::all();
        $category = VideoCategory::findBySlugOrFail($slug);
        $category_name = $category['name'];
        $id = $category['id'];
        $videos = Video::where('category_id', '=', $id)->get();

        return view('front.videos', compact('video_categories', 'videos', 'category_name'));
        

    }
}
