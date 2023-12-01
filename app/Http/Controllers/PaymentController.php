<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Auth;
use DB;
use Validator, Redirect;
use App\Models\{Payment, GuestUser};

class PaymentController extends Controller
{
      /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {

        $user_id = Auth::user()->id;
      

       $courses = DB::table('carts')
       ->join('courses', 'carts.course_id', 'courses.id')
       ->join('users', 'carts.user_id', 'users.id')
       ->select('courses.name', 'courses.image', 'courses.price', 'carts.quantity', 'carts.total_price')
       ->where('carts.user_id', $user_id)
       ->where('carts.status', '0')
       ->get();
      

        $sub_total =$courses->sum('total_price');
        return view('stripe', compact('sub_total'));
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        $user_id = Auth::user()->id;
        $courses = DB::table('carts')->where('user_id', $user_id)->where('status', '0')->first();
        
        if(empty($courses)){
            return redirect()->back()->with('error', 'You have no course added in cart');
        }
        
        try{

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $response=Stripe\Charge::create ([
                "amount" => 100 * $request->ammout,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "User Payment." 
        ]);

        if($response->status ="succeeded"){
           
            $courses = DB::table('carts')->where('user_id', $user_id)->where('status', '0')->get();

            $sub_total =$courses->sum('total_price');
            $this->Envoice($courses ,$response);

            $response->amount = intval($response->amount)/100;
            $array =[];
            foreach( $courses as  $course){

                $Payment = new Payment;
                $Payment->user_id = $user_id;
                $Payment->cart_id = $course->id;
                $Payment->course_id = $course->course_id;
                $Payment->transection_id = $response->id;
                $Payment->currency = $response->currency;
                $Payment->amount = $course->total_price;
                $Payment->discounted_price = $course->discounted_price;
                $Payment->total_amount = $response->amount;
                $Payment->receipt_url = $response->receipt_url;
                $Payment->status = $response->status;
                $Payment->save();

                $update= DB::table('carts')->where('id',  $course->id)->delete();     
            }
            $array[] = $update;
            Session::flash('success', 'Payment has been received successfully!'); 
            return redirect('/thankyou');
        }else{
            return redirect()->back()->with('error', 'Payment Failed');
        }
        } catch (\Throwable $th) {
                    return view('errors.stripe',compact('th'));
                }
        
    }

    public function Envoice($courses, $response)
    {
       
        $envoice=[];
        foreach($courses as $arr)
        {
            $course= DB::table('carts')
            ->leftjoin('courses', 'carts.course_id', 'courses.id')
            ->leftjoin('users', 'carts.user_id', 'users.id')
            ->select('courses.name', 'courses.image', 'courses.price', 'carts.total_price')
            ->where('carts.id', $arr->id)
            ->first();

            $email= \DB::table('users')->where('id', $arr->user_id)->pluck('email')->first();

            $user_detail= \DB::table('users')->where('id', $arr->user_id)->select('*')->first();

            $envoice[]=  $course;
        }
            $data['email']=$email;
           
          
          
            $mail = \Mail::send('email.invoice', ['envoice' => $envoice, 'user_detail' => $user_detail,  'response'=> $response], function ($message) use ($data) {
                $message->to($data['email'])->subject('NVQ COURSES');
            });

            $admin =\DB::table('admins')->select('*')->first();

            $mail = \Mail::send('email.invoice', ['envoice' => $envoice, 'user_detail' => $user_detail,  'response'=> $response], function ($message) use ($admin) {
                $message->to($admin->email)->subject('NVQ COURSES');
            });
    }


    public function GuestPayment(Request $request)
    {
    
       $validateUser = Validator::make(
        $request->all(),
        [
            'guest_id' => 'required',
            'ammout' => 'required',
        ]
    );
    if ($validateUser->fails()) {
        return Redirect::back()->withErrors($validateUser->errors());
    }
    try{
        
    

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $response=Stripe\Charge::create ([
                "amount" => 100 * $request->ammout,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "User Payment." 
        ]);
   
        if($response->status ="succeeded"){
                $input=[
                    'payment_status'=>'1',
                    'transection_id'=>$response->id,
                    'currency'=>$response->currency,

                ];   
        $guest_payment =GuestUser::where('id', $request->guest_id)->update( $input);
                
            
        $this->GuestEnvoice($request->guest_id, $response);
                
      
        Session::flash('success', 'Payment has been received successfully!'); 
        return redirect('/thankyou');
        }else{
            return redirect()->back()->with('error', 'Payment Failed');
        }
        } catch (\Throwable $th) {
                return view('errors.stripe',compact('th'));
            }
    }

    public function GuestEnvoice($id,$response)
    {

        $courses = DB::table('guest_users')
        ->leftjoin('courses', 'guest_users.course_id', 'courses.id')
        ->select('courses.name as course_name', 'courses.image', 'courses.price', 'guest_users.*')
        ->where('guest_users.id', $id)
        ->first();

        $mail = \Mail::send('email.guest_invoice', ['courses' => $courses, 'response'=> $response], function ($message) use ($courses) {
            $message->to($courses->email)->subject('NVQ COURSES');
        });

        $admin =\DB::table('admins')->select('*')->first();

        $mail = \Mail::send('email.guest_invoice', ['courses' => $courses, 'response'=> $response], function ($message) use ($admin) {
            $message->to($admin->email)->subject('NVQ COURSES');
        });
    }


}
