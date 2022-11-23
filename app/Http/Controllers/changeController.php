<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\recieptModel;
use App\Models\ingridientModel;
use App\Models\productModel;
use App\Models\cookingStepsModel;
class changeController extends Controller
{
    public function get_all_reciept_data(Request $request)
    {
        $id_reciept = $request->input('id_reciept');

        
       
        $products = array();
        $steps = array();
        
        $title = recieptModel::where('id',$id_reciept)->first()->title;
        $description = recieptModel::where('id',$id_reciept)->first()->description;
        //return response()->json(['id'=>$id_reciept]);
       
        $ingridients = ingridientModel::where('id_reciept',$id_reciept)->get();
        $_steps = cookingStepsModel::where('id_reciept',$id_reciept)->get();
        foreach($ingridients as $ingridient)
        {
            array_push($products , productModel::where('id',$ingridient->id_product)->first()->name );
        }

        foreach($_steps as $step)
        {
            array_push($steps ,$step->description );
        }
        return response()->json([
        'id_reciept'=>$id_reciept,
        'title'=>$title,
        'description'=>$description,
        'products'=>$products,
        'steps'=>$steps,
        
       ]);
    }

    public function change_reciept_data(Request $request)
    {
        $id_reciept = $request->input('id_reciept');
       
        $title      = $request->input('title');
        $description = $request->input('description');


        $reciept = recieptModel::where('id',$id_reciept)->first();
       

        
        $reciept->title = $title;
        $reciept->description= $description;

        $reciept->save();



        //удаляем все продукты и шаги
        $ingridients = ingridientModel::where('id_reciept',$id_reciept)->get();
        $_steps = cookingStepsModel::where('id_reciept',$id_reciept)->get();
        foreach($ingridients as $ingridient)
        {
            $ingridient->delete();
           
        }

        foreach($_steps as $step)
        {
            $step->delete();
        }

        



        $ingridients   = $request->input('ingridients');
        $steps      = $request->input('steps');

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
            $ingerid->id_reciept=$id_reciept;
            $ingerid->save();
        }
      

        //создание ингридиента (много ко многим)



        //добавление шагов
        foreach($steps as $step)
        {
            $cooking_step = new cookingStepsModel();
           
            $cooking_step->description = $step;
            $cooking_step->id_reciept=$id_reciept;;
            $cooking_step->save();
               
                        
        }





        return response()->json([
            'id_reciept'=>$id_reciept,
            'title'=>$title,
            'description'=>$description,
            'products'=>$ingridients,
            'steps'=>$steps,
            
           ]);

    }




    public function delete_all_reciept_data(Request $request)
    {
        $id_reciept = $request->input('id_reciept');
        $reciept = recieptModel::where('id',$id_reciept)->first();
        $reciept->delete();
        
        return response()->json("resiept $id_reciept was deleted",200);

    }

}
