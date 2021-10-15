<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page_option = ['main' => 'dash', 'sub' => 'dash'];
        $page_name = "Dashboard";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'Dashboard', 'url' => '#'],
        ];

        return view('home', compact('page_name', 'breadcrums','page_option'));
    }
    public function add_product()
    {
        $page_option = ['main' => 'product', 'sub' => 'add_product'];
        $page_name = "Product";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'Product', 'url' => '#'],
        ];

        return view('page.member.product', compact('page_name', 'breadcrums', 'page_option'));
    }
    public function chart()
    {
        $page_option = ['main' => 'product', 'sub' => 'add_chart'];
        $page_name = "chart";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'chart', 'url' => '#'],
        ];

        return view('page.member.chart', compact('page_name', 'breadcrums', 'page_option'));
    }
    public function test()
     {
        $page_option = ['main' => 'product', 'sub' => 'add_test'];
        $page_name = "test";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'test', 'url' => '#'],
        ];

        return view('page.member.test', compact('page_name', 'breadcrums', 'page_option'));
    }

    public function addnew()
     {
        $page_option = ['main' => 'product', 'sub' => 'add_addnew'];
        $page_name = "Addnew";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'addnew', 'url' => '#'],
        ];

        return view('page.member.add_new', compact('page_name', 'breadcrums', 'page_option'));
    }

     public function liveupdate()
     {
        $page_option = ['main' => 'product', 'sub' => 'add_liveupdate'];
        $page_name = "Live Update";
        $breadcrums = [
            ['name' => 'Home', 'url' => '#'],
            ['name' => 'liveupdate', 'url' => '#'],
        ];

        return view('page.member.live_update', compact('page_name', 'breadcrums', 'page_option'));
    }
}
