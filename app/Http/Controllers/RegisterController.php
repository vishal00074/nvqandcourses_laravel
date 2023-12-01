<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redirect;
use App\Models\User;
use Session,URL, Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function Register()
    {
        return view('auth.register');
    }

    public function SubmitRegister(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' =>  [
                'required',
                    'string',
                    'min:8',    
                ],
                'password_c' => 'required|same:password',
                'phone'=>'required',
                'gender'=> 'required',
            ]

        );

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }


        $code = mt_rand(1111, 9999);
        $message = "Your NVQ Courses Registration code" . $code;

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['verification_time'] =  date('Y-m-d H:i:s', strtotime('2 minute'));
        $input['code']=   $code;

        /** Is User Already Existed  */
        $is_verified =User::where('email', $request->email)->where('is_verified', '1')->first();
        if($is_verified){
            return redirect()->back()->with('error', 'User email already registred');
        }


        /**   Is user already In Database but not verified */
        $is_exist =User::where('email', $request->email)->where('is_verified', '0')->first();

        if(!empty($is_exist)){
        $is_exist->name = $request->name;
        $is_exist->gender = $request->gender;
        $is_exist->password = bcrypt($input['password']);
        $is_exist->verification_time =  date('Y-m-d H:i:s', strtotime('2 minute'));
        $is_exist->code =$code;
        $is_exist->update();
        $data['name'] = $is_exist->name;
        $data['email'] = $is_exist->email;
        $data['title'] = "Welcome to NVQ Web Application";
        $data['body']  = "You have successfully registered in NVQ web application";
        $data['otp']  = $code;

        \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

      

   
        return redirect()->route('otp.verification', ['id' => $is_exist->id])->with('success', 'otp has sent to your email');

         /**     Is user new     */
        }else{
            $user = User::create($input);
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['title'] = "Welcome to NVQ Web Application";
            $data['body']  = "You have successfully registered in NVQ web application";
            $data['otp']  = $code;
    
            \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'])->subject($data['title']);
            });
    
    
           
       
            return redirect()->route('otp.verification', ['id' => $user->id])->with('success', 'otp has sent to your email');
        } 
    }

    public function otp(Request $request, $id)
    {
        return view('auth.otp', compact('id'));
    }

     /**
     * Verify api
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyOTP(Request $request){
 
            $validateUser = Validator::make(
                $request->all(),
                [
                    'otp' => 'required',
                    'user_id'=> 'required'
                ]
            );
            if ($validateUser->fails()) {
                return Redirect::back()->withErrors($validateUser->errors());
            }
            $verify_user = User::where('id', $request->user_id)->where('code', $request->otp)->first();
            if ($verify_user) {
                if (date('Y-m-d H:i:s') <= $verify_user->verification_time) {
                    $users = User::where('id', $request->user_id)->first();
                    $users->is_verified = '1';
                    $users->update();

                    return redirect()->route('user.login');
                } else {
              
                    return Redirect::back()->with('error','Verification code has been expired');
                }
            } else {
                return Redirect::back()->with('error','Verification code is not valid');
            }
      
    }

    public function ResendOtp($id)
    {
        $code = mt_rand(1111, 9999);
        $user = User::where('id', $id)->first();
        if($user){
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['title'] = "Welcome to NVQ Web Application";
        $data['body']  = "You have successfully registered in NVQ Web Application";
        $data['otp']  = $code;


        \Mail::send('email.wecomeemail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });
        $user->code =$code;
        $user->verification_time =  date('Y-m-d H:i:s', strtotime('2 minute'));
        $user->update();

            return redirect()->back()->with('success', 'New Otp has been sent successfully');
        }else{
            return redirect()->back()->with('error', 'Opps! Something went wrong');
        }
    }

    public function Login(Request $request)
    {
        return view('auth.login');
    }

    public function LoggedIn(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $customer = User::where('email', $request->email)->where('is_verified', '1')->first();
            if ($customer) {
                return redirect()->intended('/')
                    ->withSuccess('Signed in');
            } else {
                return redirect()->back()->with('error', 'User not Verified');
            }
        }
        return redirect()->back()->with('error', 'Login details are not valid');
    }
    public function SignOut()
    {
        if (!Auth::guest()) {
            Session::flush();
            Auth::logout();

            return Redirect('/')->with('success', 'Signout successfully');
        } else {

            return Redirect()->back();
        }
    }


    public function GetProfile(Request $request)
    {
        $id =Auth::user()->id;
        $data= \DB::table('payments')
        ->join('courses', 'payments.course_id','=', 'courses.id')
        ->join('users', 'payments.user_id', 'users.id')
        ->select('courses.name', 'courses.image', 'courses.id')
        ->orderby('payments.created_at', 'desc')
        ->where('users.id', $id)
        ->get();
        $user= User::where('id', $id)->first();
 

        return view('pages.profile', compact('data', 'user'));
    }

    public function UpdateProfile(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'id' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'gender' => 'required',
            ]
        );

        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }
        $input=[
            'name' =>$request->name,
            'phone' => $request->phone,
            'gender' =>$request->gender,
        ];

        $user =User::where('id', $request->id)->update($input);

        return Redirect::back()->with('success', 'Profile has been updated successfully');
        
    }
    
    public function Forget_Password(Request $request){
        return view('auth.forget_password');
    }
    
    
    public function SubmitRequest(Request $request)
    {
        try{
            $users = User::where('email', $request->email)->get();
            
            foreach($users as $user){
                $username = $user->name;
            }
    
            if(count($users) > 0)
            {
                $random= Str ::random(40);
                $domain= URL::to('/');
    
                $url = $domain.'/forget-password?token='.$random;
                
                // Mail_____________________________________________________________
                $data['url'] = $url;
                $data['email'] =$request->email;
                $data['title'] ="Reset Your Password";
                $data['app'] = "NVQ & Courses Web Application";
                $data['username']= $username;
    
                $mail= \Mail::send('email.Verify', ['data'=>$data],function($message) use ($data){
                    $message->to($data['email'])->subject($data['title']); 
                });
    
                $users =User::find($users[0]['id']); 
                $users->remember_token = $random;
                $users->save();
                 
                return redirect("/login")->with('success','Reset Link Has been sent in your email');
            }
            else{
                return redirect()->back()->with('error','Email not found');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    
    public function verificationMail(Request $request)
    {
       try{
        $users= User::where('remember_token', $request->token)->first();
        if(!empty($users) || $users!=null)
        {
        $is_token= User::where('remember_token', $request->token)->first();
        $is_token->remember_token = '';
        $is_token->update();
        $data=$users->email;

        // dd($data);
        if(isset($request->token) && $users)
        {
            $customer=User::where('email', $data)->get();
            return view('forget_password', compact('customer'));
        }else {
         return "<h1>Oops something went wrong</h1>";
        }
      }else{
        return "<h1>Link Expired</h1>";
      }
        }catch (\Throwable $th) {
            return response()->json([
            'status' => 'false',
            'message' => $th->getMessage()
            ], 200);
        }

    }

    public function ForgetPassword(Request $request)
    {
        try{

        $validateUser = Validator::make($request->all(), 
        [
            // 'id' => 'required',
            'password' =>  [
                'required',
                'string',
                'min:8',             
        
            ],
            'confirm_password' => 'required|same:password|min:8'
        ]);
        if($validateUser->fails()){
            return Redirect::back()->withErrors($validateUser->errors());
        }

            $customers= User::where('id', $request->id)->first();
            $customers->password=  Hash::make($request->password);
            $customers->update();
            if($customers)
            {
                return "<h1>You have successfully changed the password</h1>";
            }
            else{
                return "<h1>Oops! something went wrong</h1>";
            }
        }catch (\Throwable $th) {
            return response()->json([
            'status' => 'false',
            'message' => $th->getMessage()
            ], 200);
        }
    }

    
}
