<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Redirect;
use DB;
use Auth;
use stdClass;
use App\Models\{Cart, GuestUser, ApplyCourses};
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Validator;

class WebCoursesController extends Controller
{
    public function NVQCourse($slug)
    {
        $nvqcourse= DB::table('courses')
        ->leftjoin('courses_levels', 'courses.level', 'courses_levels.id')
        ->select('courses.*', 'courses_levels.level as level_name')
        ->where('courses_levels.slug', $slug)
        ->where('course_type', 'NVQ Courses')
        ->where('courses.status', 'Active')
        ->orderby('courses.serial_by', 'desc')
        ->paginate(6);
       
        foreach($nvqcourse as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }

        $latest_courses=  DB::table('courses')
        ->leftjoin('courses_levels', 'courses.level', 'courses_levels.id')
        ->select('courses.*')
        ->where('courses_levels.slug', $slug)
        ->where('course_type', 'NVQ Courses')
        ->where('courses.status', 'Active')
        ->orderby('courses.updated_at', 'desc')
        ->take(7)
        ->get();
   

        $level =  DB::table('courses_levels')->select('*')->where('slug', $slug)->first();
       

        return view('pages.nvqcourses',  compact('nvqcourse','level', 'latest_courses'));
    }

    public function Courses()
    {
        $courses = Courses::select('*')->where('course_type', 'Courses')->get();
   
        foreach($courses as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }
      
        return view('pages.courses', compact('courses'));
    }

    public function CoursesDetail(Request $request, $slug)
    {
        $courses = DB::table('courses')
        ->leftjoin('courses_levels', 'courses.level', 'courses_levels.id')
        ->select('courses.*', 'courses_levels.level as level_name', 'course_type')
        ->where('courses.slug', $slug)
        ->first();
        // dd($courses);
        $latest_courses=  DB::table('courses')
        ->select('*')
        ->where('course_type', 'Courses')
        ->whereNot('slug', $slug)
        ->orderby('created_at', 'desc')
        ->take(7)
        ->get();
  

        $courses->description = strip_tags($courses->description);
        $courses->column1 = strip_tags( $courses->column1);
        $courses->column2  = strip_tags( $courses->column2);
        $courses->column3 = strip_tags( $courses->column3);
        $courses->column4 = strip_tags( $courses->column4);
       
        $auth= Auth::user();
        if($auth!=null){
            $cart= Cart::where('user_id', $auth->id)->where('course_id', $id)->where('status', '0')->first();
                return view('pages.courses_detail', compact('courses', 'cart', 'latest_courses'));
       
        }
        $seo = new stdClass();
        $seo->seo_title = $courses->seo_title ?? '';
        $seo->seo_keyword = $courses->seo_keyword ?? '';
        $seo->seo_description = $courses->seo_description ?? '';
        // dd($seo);
        return view('pages.courses_detail', compact('courses', 'latest_courses', 'seo'));
    }

    public function CartDetail(Request $request)
    {
        $user_id = Auth::user()->id;

        $courses = DB::table('carts')
        ->join('courses', 'carts.course_id', 'courses.id')
        ->join('users', 'carts.user_id', 'users.id')
        ->select('carts.id','courses.name', 'courses.image', 'courses.price', 'carts.quantity', 'carts.total_price')
        ->where('carts.user_id', $user_id)
        ->where('carts.status', '0')
        ->get();
         
        $is_exited=DB::table('carts')->where('user_id', $user_id)->where('status', 0)->exists();
          
        $sub_total =$courses->sum('total_price');
       
        return view('pages.cart', compact('courses', 'sub_total', 'is_exited'));
    }

    public function Cart(Request $request, $id)
    {
        $user_id = Auth::user()->id;

      
        /**is Already */

        $cart= Cart::where('user_id', $user_id)->where('course_id', $id)->where('status', '0')->first();

        if($cart){
            return redirect()->back()->with('warning', 'course is already added in cart'); 
        }
        $courses = DB::table('courses')
        ->select('*')
        ->where('id', $id)
        ->first();
        
       $cart = new Cart;
       $cart->course_id = $id;
       $cart->user_id = $user_id;
    //    $cart->quantity = '1';
    //    $cart->price = $courses->price;
       $cart->total_price = $courses->price;
       $cart->price = $courses->price;
       $cart->save();

       return redirect()->back()->with('success', 'Course Added Successfully'); 
    }

    public function DeleteCart($id)
    {
        $cart = Cart::where('id', $id)->delete();
        return redirect()->back()->with('info', 'Course has been deleted from cart'); 
    }

    public function GuestCart(Request $request, $id)
    {
        return view('pages.guest_form', compact('id'));
    }


    public function GuestRegister(Request $request)
    {
       
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone'=>'required',
                'course_id'=>'required',
                'payment_method' => 'required',
               
            ]
        );
        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        }
        $amount =DB::table('courses')->where('id', $request->course_id)->pluck('price')->first();
       
        $input =  $request->all();
        $input['total_amount']= $amount;

        $guest_user =GuestUser::create($input);

      if($request->payment_method=="paypal")
      {
        return redirect()->route('paypal.get', ['id' => $guest_user->id]);
      }else{
        return redirect()->route('guest.payment', ['id' => $guest_user->id]);
      }
        

    }

    public function GetPaymentStripe($id)
    {
        $guest_user= GuestUser::where('id', $id)->first();
        return view('stripe_guest_payment', compact('guest_user'));
    }

    public function ApplyCourse($id)
    {
        $course = \DB::table('courses')->where('id', $id)->select('*')->first();

        return view('pages.applyform', compact('course'));
    }

    public function EnquireCourse($id)
    {
        $course = \DB::table('courses')->where('id', $id)->select('*')->first();

        return view('pages.applyform', compact('course'));
    }

    public function SubmitApplyCourse(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone'=>'required',
                'gender'=>'required',
                'course_id'=>'required',
    
               
            ]
        );
        if ($validateUser->fails()) {
            return Redirect::back()->withErrors($validateUser->errors());
        } 

          $data =ApplyCourses::create($request->all());


          $course = Courses::where('id', $request->course_id)->select('*')->first();

          $contact =\DB::table('contact_us')->select('*')->first();
        

           $mail = \Mail::send('email.apply_invoice', ['data' => $data, 'course'=> $course, 'contact'=> $contact], function ($message) use ($data) {
                $message->to($data['email'])->subject('NVQ COURSES');
            });

            $admin =\DB::table('admins')->select('*')->first();

            $mail = \Mail::send('email.apply_invoiceadmin', ['data' => $data, 'course'=> $course, 'contact'=> $contact ], function ($message) use ($admin) {
                $message->to($admin->email)->subject('NVQ COURSES');
            });
            
            return view('pages.coursethankyou');

    }

    public function ShortCourses(Request $request)
    {
        $courses = \DB::table('courses')->where('course_type', 'Short Courses')->select('*')->get();

        foreach($courses as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }

        return view('pages.short_courses', compact('courses'));
    }

    public function PlumbingCourses(Request $request)
    {
        $courses = \DB::table('courses')->where('course_type', 'Plumbing/Gas')->select('*')->get();

        foreach($courses as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }
        
        return view('pages.pulmbing_courses', compact('courses'));
    }
    
    public function ElectricalCourses(Request $request){
        $courses = \DB::table('courses')->where('course_type', 'Electrical Courses')->select('*')->get();
        
        foreach($courses as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }
        
        return view('pages.electrical_courses', compact('courses'));
    }
    
    public function CITBCourses(Request $request){
        $courses = \DB::table('courses')->where('course_type', 'CITB Courses')->select('*')->get();
        
        foreach($courses as $course)
        {
            $course->description = strip_tags( $course->description) ;
            $course->description = implode(' ', array_slice(str_word_count($course->description, 2), 0, 10)).'...';
        }
        
        return view('pages.citb_courses', compact('courses'));
    }


    public function Slug(Request $request)
    {
        $courses = \DB::table('courses')->select('*')->get();
       

        // foreach($courses as $course)
        // {
            
        //     Courses::where('id', $course->id)->update(['slug'=> \Str::slug($course->name)]);

        // }
        return true;

    }
}
