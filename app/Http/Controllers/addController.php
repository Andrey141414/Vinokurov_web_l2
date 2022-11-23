<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recieptModel;
use App\Models\ingridientModel;
use App\Models\productModel;
use App\Models\cookingStepsModel;
use GrahamCampbell\ResultType\Success;

class addController extends Controller
{
    //
    public $id_resiept;
    public function createReciept(Request $request)
    {
        

        $title = $request->input('title'); 
        $description = $request->input('description');

        $ingridients = $request->input('ingridients');
        $steps = $request->input('steps');
        
        //создание рецепта
        $rm = new recieptModel();
        
        $rm->title = $title;
        $rm->description = $description;
        $rm->save();
        
        //добавление продуктов и ингридиентов
       
        foreach($ingridients as $ingridient)
        {

            $product = new productModel();
           
            
            if(productModel::where('name',$ingridient)->exists())
            {
                $product_id = $product->where('name',$ingridient)->first()->id;
            }
            else{
                $product->name =$ingridient;
                $product->save();
                $product_id = $product->id;
            }            

            $ingerid = new ingridientModel();
            $ingerid->id_product = $product_id;
            $ingerid->id_reciept=$rm->id;
            $ingerid->save();
        }
      

        //создание ингридиента (много ко многим)



        //добавление шагов
        foreach($steps as $step)
        {
            $cooking_step = new cookingStepsModel();
           
            $cooking_step->description = $step;
            $cooking_step->id_reciept=$rm->id;;
            $cooking_step->save();
               
                        
        }
        
        return response()->json('okey',200);
    }
  

    
}
