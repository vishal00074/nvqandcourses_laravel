<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\{CoursesLevel,Seo};
use Session;

class CoursesLevelController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()){
                $data = CoursesLevel::orderby('id','ASC');
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. route('courses_level.edit', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-course-level btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->filter(function ($instance) use ($request) {
                        if ($request->get('Status') == 'Active' || $request->get('Status') == 'Inactive') {
                            $instance->where('Status', $request->get('Status'));
                        }
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('level', 'LIKE', "%$search%");
                            });
                        }
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.courses.level.index');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('admin.courses.level.add');
    }

    public function store(Request $request)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            
            $data['slug'] = SlugService::createSlug(CoursesLevel::class, 'slug', $request->level);
            
            CoursesLevel::insert($data);
            Session::flash('success','Successfully added courses-level details!');
            return redirect('/admin/courses_level');
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
        $level = CoursesLevel::find($id);
        return view('admin.courses.level.edit',compact('level'));
    }

    public function update(Request $request, string $id)
    {
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            $data['slug'] = SlugService::createSlug(CoursesLevel::class, 'slug', $request->level);
            
            CoursesLevel::find($id)->update($data);
            Session::flash('success','Successfully updated courses-level details!');
            return redirect('/admin/courses_level');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }

    public function destroy(string $id)
    {
        CoursesLevel::find($id)->delete();
    }
    
}
