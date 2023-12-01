<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Courses,CoursesLevel,Seo,Cart,Payment,GuestUser,ApplyCourses,Icon};
use Session;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $data = Courses::orderby('id','DESC');
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. route('courses.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void('. $data->id .')" data-id="'. $data->id .'" class="delete-courses btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->filter(function ($instance) use ($request) {
                        // if ($request->get('Status') == 'Active' || $request->get('Status') == 'Inactive') {
                            $instance->where('level', $request->get('Status'));
                        // }
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")->orWhere('course_type', 'LIKE', "%$search%");
                            });
                        }
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.courses.index');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function create()
    {
        $level = CoursesLevel::orderBy('id','asc')->get();
        $icons = Icon::get();
        return view('admin.courses.add',compact('level','icons'));
    }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('assets/images/courses'), $name);
                $data['image'] = url('public/'.'assets/images/courses/'.$name);
            }
            
            //icon____________________
            if($request->file('icon')){
                $name = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('assets/admin/icons'), $name);
                $data['icon'] = url('public/'.'assets/admin/icons/'.$name);
            }
            $data['slug'] = \Str::slug($request->name);
            Courses::insert($data);
            Session::flash('success','Successfully added courses details!');
            return redirect('/admin/courses');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $course = Courses::find($id);
        $level = CoursesLevel::orderBy('id','asc')->get();
        $icons = Icon::get();
        return view('admin.courses.edit',compact('course','level','icons'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('assets/images/courses'), $name);
                $data['image'] = url('public/'.'assets/images/courses/'.$name);
            }
            
            //icon____________________
            if($request->file('icon')){
                $name = $request->file('icon')->getClientOriginalName();
                $request->file('icon')->move(public_path('assets/admin/icons'), $name);
                $data['icon'] = url('public/'.'assets/admin/icons/'.$name);
            }
            
            Courses::find($id)->update($data);
            Session::flash('success','Successfully updated courses details!');
            return redirect('/admin/courses');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        $course = Courses::find($id)->delete();
    }
    
    
    
    
    
    
    
    // ENROLLED COURSES_________________________________________________________
    public function enrolled_courses(Request $request)
    {
        try{
            if($request->ajax()){
                // $data = Payment::leftjoin('users','users.id','=','payments.user_id')
                //             ->select('payments.*','users.name as username','users.email','users.phone')
                //             ->orderBy('payments.id','DESC')->get();
                
                $data = Payment::leftJoin('users', 'users.id', '=', 'payments.user_id')
                            ->selectRaw('MAX(payments.id) as id, payments.transection_id, payments.user_id, payments.total_amount, 
                                            users.name as username, users.email')
                            ->groupBy('payments.transection_id', 'payments.user_id', 'payments.total_amount', 'users.name', 'users.email')
                            ->orderBy('id', 'DESC')
                            ->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. url('/admin/enrolled_courses', $data->id ) .'" class="btn btn-sm btn-success">View</a>';
                        $btn = $btn.' <a href="javascript:void('. $data->id .')" data-id="'. $data->id .'" class="delete-enrolled_courses btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.courses.enrolled_courses');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function enrolled_courses_destroy($id){
        $course = Payment::find($id);
        Payment::where('transection_id','LIKE',$course->transection_id)->delete();
    }
    
    public function enrolled_courses_show($id){
        $data = Payment::find($id);
        $payment = Payment::where('transection_id','LIKE',$data->transection_id)->get();
        return view('admin.courses.enroll_view',compact('data','payment'));
    }
    // END-ENROLLED COURSES_____________________________________________________
    
    
    
    
    
    
    
    // ENROLLED COURSES_________________________________________________________
    public function enrolled_guest(Request $request)
    {
        try{
            if($request->ajax()){
                $data = GuestUser::leftjoin('courses','courses.id','=','guest_users.course_id')
                            ->select('guest_users.*','courses.name as coursename')
                            ->where('guest_users.payment_status','LIKE',1)
                            ->orderBy('guest_users.id','DESC')->get();
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. url('/admin/enrolled_guest', $data->id ) .'" class="btn btn-sm btn-success">View</a>';
                        $btn = $btn.' <a href="javascript:void('. $data->id .')" data-id="'. $data->id .'" class="delete-enrolled_courses btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.courses.enrolled_guest');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function enrolled_guest_destroy($id){
        $course = GuestUser::find($id)->delete();
    }
    
    public function enrolled_guest_show($id){
        $data = GuestUser::find($id);
        return view('admin.courses.enroll_guest_view',compact('data'));
    }
    // END-ENROLLED COURSES_____________________________________________________
    
    
    
    
    
    
    
    // APPLIED COURSES_________________________________________________________
    public function applied_courses(Request $request)
    {   
        try{
            if($request->ajax()){
                $data = ApplyCourses::leftjoin('courses','courses.id','=','apply_courses.course_id')
                            ->select('apply_courses.*','courses.name as coursename')
                            ->orderBy('apply_courses.id','DESC')->get();

                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. url('/admin/applied_courses', $data->id ) .'" class="btn btn-sm btn-success">View</a>';
                        $btn = $btn.' <a href="javascript:void('. $data->id .')" data-id="'. $data->id .'" class="delete-applied_courses btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.courses.applied_courses');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function applied_courses_destroy($id){
        ApplyCourses::find($id)->delete();
    }
    
    public function applied_courses_show($id){
        $data = ApplyCourses::find($id);
        return view('admin.courses.applied_view',compact('data'));
    }
    // END-APPLIED COURSES_____________________________________________________
}
