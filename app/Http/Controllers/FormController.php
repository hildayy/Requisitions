<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Requisitions;
Use App\Gmail;
use Illuminate\Support\Facades\Mail;
use Redirect;
use Response;


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
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Item' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'cost' => 'required',
            'total' => 'required'
        ]);
       /* $request ->validate([
            'name' => 'required',
            'email' => 'required|email',
            'Item' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'cost' => 'required',
            'total' => 'required'
        ]);*/
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
        
        $to_name='hildah';
        $from_name=$request['name'];
        $from_email=$request['email'];
        $data = array(
            'name'=>$to_name, 
            "body" => "Test mail"
        );

        Mail::send('emails\gmail', $data, function($message)use($to_name,$from_email,$from_name) {
            $message->to('hildah.dala@gmail.com')
            ->subject('Requisitions With Gmail');
            $message->from($from_email,$from_name);

        });
          
        return redirect()->route('index')
                         ->with('success','Requisition has been made successfully.');
     
    }


    public function requisitions($id)
    {
        $requisitions=Requisitions::where('req_id','=',$id)->get();
        $commonId = $id;
        return view('products',compact('requisitions', 'commonId'));
    }

    public function approveReq($id, Request $request)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'approved';
        $form->save();

        foreach($requisitions as $requisition) {
            $requisition->feedback = 'approved';
            $requisition->save();
        }
         
        $from_name='hildah';
        $to_name=$request['name'];
        $to_email=$request['email'];
        $data = array(
            'name'=>$to_name, 
            "body" => "Test2 mail"
        );

        Mail::send('emails\gmail2', $data, function($message)use($to_name,$to_email,$from_name) {
            $message->to('jhildah24@gmail.com')
            ->subject('Requisitions With Gmail');
            $message->from('jelagathildah@gmail.com',$from_name);

        });
          
       

        return redirect()->back()->with('success', 'Approved.');
    }
    public function disapproveReq($id)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'Disapproved';
        $form->save();

        foreach($requisitions as $requisition) {
            $requisition->feedback = 'disapproved';
            $requisition->save();
        }
        $from_name='hildah';
        $to_name=$request['name'];
        $to_email=$request['email'];
        $data = array(
            'name'=>$to_name, 
            "body" => "Test2 mail"
        );

        Mail::send('emails\gmail2', $data, function($message)use($to_name,$to_email,$from_name) {
            $message->to('jhildah24@gmail.com')
            ->subject('Requisitions With Gmail');
            $message->from('jelagathildah@gmail.com',$from_name);

        });

        return redirect()->back()->with('success', 'Disapproved.');
    }
    

}
