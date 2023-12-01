<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Omnipay\Omnipay;
use App\Models\GuestUser;
use Session;

class PayPalController extends Controller
{


    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(false);
    }

    public function GetPaypal($id)
    {
        $guest_user= GuestUser::where('id', $id)->first();

        $amount = $guest_user->total_amount;

        return view('paypal', compact('amount', 'id'));
    }

    public function pay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success', ['id' => $request->id]),
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

    public function success(Request $request, $id)
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

                $input=[
                    'payment_status'=>'1',
                    'transection_id'=> $arr['id'],
                    'currency'=>env('PAYPAL_CURRENCY'),

                ];   
                $guest_payment =GuestUser::where('id', $id)->update( $input);

                $this->GuestEnvoice($id, $arr);

                Session::flash('success', 'Payment successfull!'); 
                return redirect('/thankyou');
            }else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function GuestEnvoice($id ,$arr)
    {
        $courses = \DB::table('guest_users')
        ->leftjoin('courses', 'guest_users.course_id', 'courses.id')
        ->select('courses.name as course_name', 'courses.image', 'courses.price', 'guest_users.*')
        ->where('guest_users.id', $id)
        ->first();

        $courses->transection= $arr['id'];
        $courses->amount= $arr['transactions'][0]['amount']['total'];
        $courses->status= $arr['state'];

  

        $mail = \Mail::send('email.paypal_guest_invoice', ['courses' => $courses,], function ($message) use ($courses) {
            $message->to($courses->email)->subject('NVQ COURSES');
        });

        $admin =\DB::table('admins')->select('*')->first();

        $mail = \Mail::send('email.paypal_guest_invoice', ['courses' => $courses], function ($message) use ($admin) {
            $message->to($admin->email)->subject('NVQ COURSES');
        });
    }

    public function error()
    {
        return 'User declined the payment!';   
    }



















   
 



}
