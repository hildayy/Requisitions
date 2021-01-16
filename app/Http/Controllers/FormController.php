<?php

namespace App\Http\Controllers;

use App\Form;
use App\Requisitions;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function index()
    {
        return view('index');
        $forms=Form::all();

       //return view('approval',compact('forms'));
        
    }
    public function index2()
    {
        //return view('index');
        $forms=Form::all();

        return view('approval',compact('forms'));
        
    }
    public function store(Request $request)
    {
        $data=$request->all();
        $lastid=Form::create($data)->id;
        if(count($request->Item)>0)
        {
            foreach($request->Item as $product=>$v)
            {
                $data2=array(
                    'req_id'=>$lastid,
                    'Item'=>$request->Item[$product],
                    'description'=>$request->description[$product],
                    'quantity'=>$request->quantity[$product],
                    'cost'=>$request->cost[$product],
                    'total'=>$request->total[$product]
                );
                Requisitions::insert($data2);
            }
        }



        $request ->validate([
            'name'=> 'required',
            'email' => 'required | email',
            'Item'=> 'required',
            'description'=> 'required',
            'quantity'=> 'required',
            'cost'=> 'required',
            'total' => 'required',
        ]);
        //Form::create($request->all());
        
        return redirect()->route('index')
                         ->with('success','Requisition has been made successfully.');
    }

    public function requisitions($id)
    {
        $requisitions=Requisitions::where('req_id','=',$id)->get();
        return view('products',compact('requisitions'));
    }

}
