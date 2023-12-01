<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\{Cart, Payment};
use Auth;
use UserPay;
use Session;

class UserPaypalController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);
    }

    public function GetUserPaypal()
    {
        $id =Auth::user()->id;
        $user= Cart::where('user_id', $id)->where('status', '0')->select('*')->get();
        $amount = $user->sum('total_price');
      

        return view('user_paypal', compact('amount', 'id'));
    }

    public function UserPay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('user_success',['id'=> $request->id]),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function UserSuccess(Request $request, $id)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                // $payment = new Payment();
                // $payment->payment_id = $arr['id'];
                // $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                // $payment->payer_email = $arr['payer']['payer_info']['email'];
                // $payment->amount = $arr['transactions'][0]['amount']['total'];
                // $payment->currency = env('PAYPAL_CURRENCY');
                // $payment->payment_status = $arr['state'];

                // $payment->save();
                $user_id =Auth::user()->id;

                $courses = \DB::table('carts')->where('user_id', $user_id)->where('status', '0')->get();
           
               $this->Envoice($courses ,$arr);

          
            $array =[];
            foreach( $courses as  $course){
                $Payment = new Payment;
                $Payment->user_id = $user_id;
                $Payment->cart_id = $course->id;
                $Payment->course_id = $course->course_id;
                $Payment->transection_id = $arr['id'];;
                $Payment->currency = env('PAYPAL_CURRENCY');
                $Payment->amount = $course->total_price;
                $Payment->total_amount = $arr['transactions'][0]['amount']['total'];
                $Payment->receipt_url = $arr['payer']['payer_info']['payer_id'];
                $Payment->status = $arr['state'];
                $Payment->save();

                $update= \DB::table('carts')->where('id',  $course->id)->delete();     
            }
                Session::flash('success', 'Payment successful!'); 
                return redirect('/thankyou');
            }else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function Envoice($courses ,$arr)
    {
        $envoice=[];
        foreach($courses as $course)
        {
            $course= \DB::table('carts')
            ->leftjoin('courses', 'carts.course_id', 'courses.id')
            ->leftjoin('users', 'carts.user_id', 'users.id')
            ->select('courses.name', 'courses.image', 'courses.price', 'carts.total_price', 'carts.user_id')
            ->where('carts.id', $course->id)
            ->first();

            $email= \DB::table('users')->where('id', $course->user_id)->pluck('email')->first();

            $user_detail= \DB::table('users')->where('id', $course->user_id)->select('*')->first();

            $envoice[]=  $course;
        }
            $data['email']=$email;
           
          
          
            $mail = \Mail::send('email.paypal_invoice', ['envoice' => $envoice, 'user_detail' => $user_detail,  'arr'=> $arr], function ($message) use ($data) {
                $message->to($data['email'])->subject('NVQ COURSES');
            });

            $admin =\DB::table('admins')->select('*')->first();

            $mail = \Mail::send('email.paypal_invoice', ['envoice' => $envoice, 'user_detail' => $user_detail,  'arr'=> $arr], function ($message) use ($admin) {
                $message->to($admin->email)->subject('NVQ COURSES');
            });
    }
}
