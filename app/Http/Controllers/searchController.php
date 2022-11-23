<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\recieptModel;
use App\Models\ingridientModel;
use App\Models\productModel;
use App\Models\cookingStepsModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
class searchController extends Controller
{
    public function searchReciept(Request $request)
    {
        $result_arr = array();
        $search = $request->input('search');

        $query = recieptModel::where('title','LIKE','%'.$search.'%')->get();
        
        foreach($query as $resiept)
        {
            $result_arr[] = array([
                $resiept->title,
                $resiept->description,
                $resiept->id,
            ]);
        }
        
        return response()->json([
            'search_result'=>$result_arr,
        ],200);
    }

    public function test(Request $request)
    {
    //     $result_arr = array();
    //     $search = $request->input('search');

    //     $query = recieptModel::where('title','LIKE','%'.$search.'%')->get();
        
    //     foreach($query as $resiept)
    //     {
    //         $result_arr[] = array([
    //             $resiept->title,
    //             $resiept->description,
    //         ]);
    //     }
        
    //     return response()->json([
    //         'search_result'=>$result_arr,
    //     ],200);
    }
}
