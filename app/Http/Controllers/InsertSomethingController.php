<?php

namespace App\Http\Controllers;

use App\Models\insertSomething;
use Illuminate\Http\Request;

class InsertSomethingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.insert_something');
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
     * @param  \App\Models\insertSomething  $insertSomething
     * @return \Illuminate\Http\Response
     */
    public function show(insertSomething $insertSomething)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\insertSomething  $insertSomething
     * @return \Illuminate\Http\Response
     */
    public function edit(insertSomething $insertSomething)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\insertSomething  $insertSomething
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, insertSomething $insertSomething)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\insertSomething  $insertSomething
     * @return \Illuminate\Http\Response
     */
    public function destroy(insertSomething $insertSomething)
    {
        //
    }
}
