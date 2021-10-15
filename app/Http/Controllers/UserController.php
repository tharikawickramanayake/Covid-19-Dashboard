<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_option = ['main' => 'user', 'sub' => 'user_index'];
        $page_name = "Details Overview";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'User', 'url' => route('user.index')],
        ];

        return view('page.user.index', compact('page_name', 'breadcrums', 'page_option'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_option = ['main' => 'user', 'sub' => 'user_create'];
        $page_name = "Create New User";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'User', 'url' => route('user.create')],
            ['name' => 'New' ,'url' => '#']
        ];

        return view('page.user.create', compact('page_name', 'breadcrums', 'page_option'));
    }

    public function profile() {

        $page_option = ['main' => 'null', 'sub' => 'null'];
        $page_name = "My Profile";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'My Profile', 'url' => "#"],
        ];

        return view('page.user.profile', compact('page_name', 'breadcrums', 'page_option'));

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
