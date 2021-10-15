<?php

namespace App\Http\Controllers\API;
use App\Chart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ApiChartController extends Controller
{
    public function  add_user_chart(Request $request)
    {
       // return $request;
        $validate_data = $request->validate([
            'income' => ['required','numeric'],
        ]);
       // return $validate_data;

        $data = Chart::create([
            'income' => $validate_data['income'],

        ]);
        return $data;
    }

    public function get_chart_data()
    {
        $c_data = chart::get();

        return response()->json($c_data);
        return response()->json(['message'=>'data is not available'],400);
    }
}
