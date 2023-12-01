<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Blog,CoursesLevel,Seo};
use Session;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $data = Blog::orderby('id','DESC');
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. route('blogs.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-blog btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('Status') == 'Active' || $request->get('Status') == 'Inactive') {
                            $instance->where('Status', $request->get('Status'));
                        }
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
                return view('admin.blogs.index');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function create()
    {
        
        return view('admin.blogs.add');
    }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('assets/images/blogs'), $name);
                $data['image'] = url('public/'.'assets/images/blogs/'.$name);
            }
            
            Blog::insert($data);
            Session::flash('success','Successfully added blog details!');
            return redirect('/admin/blogs');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $blog = Blog::find($id);
        // dd($blog);
        return view('admin.blogs.edit',compact('blog'));
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
                $request->file('image')->move(public_path('assets/images/blogs'), $name);
                $data['image'] = url('public/'.'assets/images/blogs/'.$name);
            }
            
            Blog::find($id)->update($data);
            Session::flash('success','Successfully updated blog details!');
            return redirect('/admin/blogs');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        try{
            
            $blog = Blog::find($id)->delete();
            
        }catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
}
