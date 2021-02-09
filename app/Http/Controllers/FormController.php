<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\Requisitions;
Use App\Gmail;
use App\Mail\RequisitionMail1;
use App\Mail\RequisitionMail2;
use App\Mail\RequisitionMail3;
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
        $forms=Form::paginate(15);
        $forms->sortBy('id',SORT_REGULAR, false);

        $approved_count = Form::where('feedback', 'Approved')->count();
        $declined_count = Form::where('feedback', 'Disapproved')->count();
        $pending_count = Form::where('feedback', 'pending')->count();
        $total = Form::count();

        return view('approval',compact('forms','approved_count','declined_count','pending_count','pending_count', 'total'));

    }
    public function store(Request $request)
    {
        // return $request->all();
        $request ->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $item = $request->Item;
        $quantity = $request->quantity;
        $cost = $request->cost;


        foreach ($item as $key => $value) {
            if ($item[$key] == null || $quantity[$key] == null || $cost[$key] == null) {
                // abort(422, 'Please fill all required fields');
                return redirect()->back()->withErrors([ 'Please fill all required fields']);
            }
        }
        $data=$request->all();
        $form=Form::create($data);
        $lastid = $form->id;
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

        $form = Form::find($lastid);

        $to_name='hildah';
        $from_name=$request['name'];
        $from_email=$request['email'];
        $to_mail = $request->department;
        $data = array(
            'name'=>$to_name,
            "body" => "Review Requisition"
        );

        $url_1 = env('APP_URL') . '/disapprove/' . $lastid;
        $url_2 = env('APP_URL') . '/approve_1/' . $lastid;

        Mail::send(new RequisitionMail1($form, $url_1, $url_2));
        // Mail::send(new RequisitionMail1($from_name, $to_mail));

        // Mail::send('emails\gmail', $data, function($message)use($to_name,$from_email,$from_name) {
        //     $message->to('hildah.dala@gmail.com')
        //     ->subject('Items Requisition');
        //     $message->from($from_email,$from_name);

        // });
        // return ;

        return redirect()->route('index')
                         ->with('success','Requisition has been made successfully.');

    }


    public function requisitions($id,Request $request)
    {
         $products=Requisitions::where('req_id', $id)->first();
        $commonId = $id;
        return view('products',compact('products', 'commonId'));
    }

    public function approveReq($id, Request $request)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'Approved';
        $form->save();

        foreach($requisitions as $requisition) {
            $requisition->feedback = 'Approved';
            $requisition->save();
        }

        $from_name='hildah';
        $to_name=$form->name;
        $to_email=$form->email;
        $data = array(
            'name'=>$to_name,
            "body" => "Response"
        );

        Mail::send('emails.gmail2', $data, function($message)use($to_name,$to_email,$from_name) {
            $message->to($to_email)
            ->subject('Requisitions Feedback');
            $message->from('mft.portal@gmail.com',$from_name);

        });



        return redirect()->route('index2')->with('success', 'Requisition Approved.');
        // return redirect()->back()->with('success', 'Approved.');
    }
    public function disapproveReq($id ,Request $request)
    {
        $requisitions = Requisitions::where('req_id', $id)->get();
        $form = Form::find($id);
        $form->feedback = 'Disapproved';
        $form->save();

        foreach($requisitions as $requisition) {
            $requisition->feedback = 'Disapproved';
            $requisition->save();
        }
        $from_name='hildah';
        $to_name=$form->name;
        $to_email=$form->email;
        $data = array(
            'name'=>$to_name,
            "body" => "Response"
        );

        Mail::send('emails.gmail3', $data, function($message)use($to_name,$to_email,$from_name) {
            $message->to($to_email,$to_name)
            ->subject('Requisitions Feedback');
            $message->from('mft.portal@gmail.com',$from_name);

        });


        return redirect()->route('index2')->with('success', 'Requisition Disapproved.');
        // return redirect()->back()->with('success', 'Disapproved.');
    }


    public function approve_1($id)
    {
        $url_1 = env('APP_URL') . '/disapprove/' . $id;
        $url_2 = env('APP_URL') . '/approve_2/' . $id;
        $form = Form::find($id);

        Mail::send(new RequisitionMail2($form, $url_1, $url_2));
        return 'Submited';
    }

    public function approve_2($id)
    {
        $url = env('APP_URL') . '/requisitions/' . $id;
        $form = Form::find($id);

        Mail::send(new RequisitionMail3($form, $url));
        return 'Submited';
    }
}
