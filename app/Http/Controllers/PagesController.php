<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserQuery;
use Auth;
use Validator;

class PagesController extends Controller
{
    public function CustomerQuery(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required', // You can add further validation rules as needed
            'about_what' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Please fill necessary details in form.')->withInput();
        }
        
        $input = $request->all();
        unset($input['_token']);
        
        if(!empty($input['name']) && !empty($input['email']) && !empty($input['phone']) && !empty($input['about_what']) &&
            !empty($input['message'])){
                
            $admin = \DB::table('admins')->first();
            $detail['name'] = $request->get('name') ?? '';
            $detail['email'] = $request->get('email') ?? '';
            $detail['phone'] = $request->get('phone') ?? ''; // Changed 'password' to 'phone'
            $detail['about_what'] = $request->get('about_what');
            $detail['message'] = $request->get('message');
            $detail['title'] = "Welcome to NVQ Web Application";
            $detail['body'] = "User raised a query to NVQ Web Application.";
            
            \Mail::send('email.user_queries', ['detail' => $detail], function ($message) use ($detail, $admin) {
                $message->to($admin->email)->subject($detail['title']);
            });
        
            UserQuery::create($input);
            return redirect()->back()->with('success', 'Your message sent to the administration');
        }
        else{
            return redirect()->back();
        }
    }
    
   
}
