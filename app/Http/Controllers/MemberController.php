<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function add_member()
    {
        $page_option = ['main' => 'member', 'sub' => 'add_member'];
        $page_name = "Add new Details";
        $breadcrums = [
            ['name' => 'Home', 'url' => route('home')],
            //['name' => 'User', 'url' => route('user.index')],
            ['name' => 'Member', 'url' => route('member.add_member')],
        ];

        return view('page.member.product', compact('page_name', 'breadcrums', 'page_option'));
    }
}
