<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recieptModel;
use App\Models\ingridientModel;
use App\Models\productModel;
use App\Models\cookingStepsModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;

class showController extends Controller
{
    public function showReciept(Request $request)
    {
        $id_resiept = $request->input('id_reciept');

        
       
        $products = array();
        $steps = array();
        
        $title = recieptModel::where('id',$id_resiept)->first()->title;
        $description = recieptModel::where('id',$id_resiept)->first()->description;
        //return response()->json(['id'=>$id_resiept]);
       
        $ingridients = ingridientModel::where('id_reciept',$id_resiept)->get();
        $_steps = cookingStepsModel::where('id_reciept',$id_resiept)->get();
        foreach($ingridients as $ingridient)
        {
            array_push($products , productModel::where('id',$ingridient->id_product)->first()->name );
        }

        foreach($_steps as $step)
        {
            array_push($steps ,$step->description );
        }
        return response()->json([
        'title'=>$title,
        'description'=>$description,
        'products'=>$products,
        'steps'=>$steps,
       ]);
    }
}
