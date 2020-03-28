<?php

namespace App\Http\Controllers;

use App\ProductGoal;
use App\Http\Requests\ProductGoalsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminProductGoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_goals = ProductGoal::all();
        return view('admin.product_goals.index', compact('product_goals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_goals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGoalsRequest $request)
    {
        ProductGoal::create($request->all());
        return redirect('/admin/product_goals');
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
        $product_goal = ProductGoal::findOrFail($id);
        return view('admin.product_goals.edit', compact('product_goal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGoalsRequest $request, $id)
    {
        $product_goal = ProductGoal::findOrFail($id);
        $product_goal->whereId($id)->first()->update($request->all());
        return redirect('/admin/product_goals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductGoal::whereId($id)->delete();
        Session::flash('product_goal_deleted', 'Product Goal Has Been Deleted Successfully');
        return redirect('/admin/product_goals');
    }
}
