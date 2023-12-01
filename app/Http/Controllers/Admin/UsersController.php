<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\{User,Seo,UserQuery};
use Session,Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $data = User::where('is_verified','LIKE','1')->orderby('id','DESC')->get();
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. route('users.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-users btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.user.index');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect('/');
        }
    }

    public function create()
    {
        return view('admin.user.add');
    }

    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'email'=> 'required|email|unique:users'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error','Email is already taken.');
            }
            
            $data = $request->all();
            unset($data['_token']);
            unset($data['cpassword']);
            $data['password'] = Hash::make($request->get('password'));
            $data['is_verified'] = 1;
            
            $user = User::create($data);
            
            
            // Mail_____________________________________________________________
            $detail['name'] = $user->name ?? $request->get('name');
            $detail['email'] = $user->email ?? $request->get('email');
            $detail['password'] = $request->get('password') ?? '';
            $detail['url'] = url('/login');
            $detail['title'] = "Welocme to NVQ Web Application";
            $detail['body']  = "You have successfully registered to NVQ Web Application.";
            
            \Mail::send('email.userregister', ['detail' => $detail], function ($message) use ($detail) {
                $message->to($detail['email'])->subject($detail['title']);
            });
            
            Session::flash('success','Successfully added users details!');
            return redirect('/admin/users');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect('/');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            User::find($id)->update($data);
            Session::flash('success','Successfully updated users details!');
            return redirect('/admin/users');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect('/');
        }
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
    }
    
    public function user_queries(Request $request){
        try{
            if($request->ajax()){
                $data = UserQuery::orderby('id','DESC')->get();
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        // $btn = '<a href="'. route('users.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = '<a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-queries btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['Actions'])
                    ->make(true);
            }else{
                return view('admin.user.queries');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect('/');
        }
    }
    
    public function user_queries_destroy(string $id)
    {
        UserQuery::find($id)->delete();
    }
}
