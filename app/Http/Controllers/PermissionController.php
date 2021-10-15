<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $page_option = ['main' => 'permission', 'sub' => 'permission_index'];
        $page_name = "Roles and Permission Management";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Permissions', 'url' => route('permission.index')],
        ];

        return view('page.permission.index', compact('page_name', 'breadcrums', 'page_option'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findById($id);
        $page_option = ['main' => 'permission', 'sub' => 'permission_index'];
        $page_name = "Permission for role";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            ['name' => 'Permissions', 'url' => route('permission.index')],
            ['name' => 'Role Overview', 'url' => '#'],
        ];

        return view('page.permission.show', compact('page_name', 'breadcrums', 'page_option','role'));
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
