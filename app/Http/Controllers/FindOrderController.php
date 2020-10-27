<?php

namespace App\Http\Controllers;

use App\Models\FindOrder;
use Illuminate\Http\Request;

class FindOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = FindOrder::latest()->paginate(10);
        return view('teammates.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FindOrder  $findOrder
     * @return \Illuminate\Http\Response
     */
    public function show(FindOrder $findOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FindOrder  $findOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(FindOrder $findOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FindOrder  $findOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FindOrder $findOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FindOrder  $findOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(FindOrder $findOrder)
    {
        //
    }
}
