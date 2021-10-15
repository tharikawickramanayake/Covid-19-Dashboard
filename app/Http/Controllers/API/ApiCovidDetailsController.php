<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CovidDetails;

class ApiCovidDetailsController extends Controller
{
    public function add_details(Request $request)
    {

    $data = CovidDetails::create([

        'Local_Deaths' =>$request->Local_Deaths,
        'Local_Total_Cases'=>$request->Local_Total_Cases,
       'Local_New_Deaths'=>$request->Local_New_Deaths,
       'Local_Recovered'=>$request->Local_Recovered,
        'Local_Active_Cases'=>$request->Local_Active_Cases,

       ]);

       //return $data;

      if(is_null($data)) return response()->json(['msg' => 'failed to create'], 400);

      return response()->json(['msg' => 'successfully added record'], 200);

    }

    public function get_details()
    {
        $user_data = CovidDetails::get();

        if(is_null($user_data)) return response()->json(['msg' =>'failed'], 400);

        return response()->json($user_data, 200);
    }

     public function search_covid_data($serach_data)
        {
            $user_data = CovidDetails::where('Local_Deaths',$serach_data)->get();

            if(is_null($user_data)) return response()->json(['msg' => 'Data not filter'], 400);

            return response()->json($user_data,200);
        }

            public function details_update(Request $request, $update_id)
           {
          $details = CovidDetails::find($update_id);

          $details->update([
            'Local_Deaths' =>$request->Local_Deaths,
            'Local_Total_Cases' =>$request->Local_Total_Cases,
            'Local_New_Deaths' =>$request->Local_New_Deaths,
            'Local_Recovered' =>$request->Local_Recovered,
            'Local_Active_Cases' =>$request->Local_Active_Cases,
        ]);

        if ($details) {
            return response()->json(['message' => 'Updated Successfully'], 200);
        } else {
            return response()->json(['message' => 'Updated unsuccessful!'], 400);
        }
           }

           public function details_delete($update_id)
           {
               $details = CovidDetails::where('id',$update_id)->delete();


                if ($details) {
                return response()->json(['message' => 'Deleted Successfully'], 200);
                } else {
                return response()->json(['message' => 'Delete unsuccessful!'], 400);
                }
           }
    }
