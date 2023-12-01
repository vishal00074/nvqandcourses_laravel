<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ContactUs,Seo,AboutUs,Header,Home,Home_Choose,Footer,PolicyTerms,SocialLinks};
use Session;

class WebPagesController extends Controller
{
    // CONTACT _________________________________________________________________
    public function contact_us(){
        $contact = ContactUs::first();
        $seo = Seo::where('type','LIKE','contact_page')->first();
        return view('admin.pages.contact.edit',compact('contact','seo'));
    }
    
    public function contact_us_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['id']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/assets/images/'), $name);
                $data['image'] = url('public/'.'frontend/assets/images/'.$name);
            }
            
            if($request->file('background_image')){
                $name = $request->file('background_image')->getClientOriginalName();
                $request->file('background_image')->move(public_path('frontend/assets/images/'), $name);
                $data['background_image'] = url('public/'.'frontend/assets/images/'.$name);
            }
            
            ContactUs::where('id',$request->get('id'))->update($data);
            
            Seo::where('type','LIKE','contact_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated contact_us details!');
            return redirect('/admin/contact_us');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // END-CONTACT _____________________________________________________________
    
    
    
    
    
    
    // ABOUT ___________________________________________________________________
    public function about_us(){
        $about = AboutUs::first();
        $seo = Seo::where('type','LIKE','about_page')->first();
        return view('admin.pages.About.edit',compact('about','seo'));
    }
    
    public function about_us_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/assets/images/'), $name);
                $data['image'] = url('public/'.'frontend/assets/images/'.$name);
            }
                
            AboutUs::where('id',$request->get('id'))->update($data);
            
            Seo::where('type','LIKE','about_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated about_us details!');
            return redirect('admin/about_us');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // END-ABOUT _______________________________________________________________
    
    
    
    
    
    
    // HOME HEADER _____________________________________________________________
    public function home_header(Request $request){
        try{
            if($request->ajax()){
                $data = Header::orderby('id','DESC');
                
                return \DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('Actions',function($data){
                        $btn = '<a href="'. url('admin/home_header', $data->id ) .'" class="btn btn-sm btn-success">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'. $data->id .'" class="delete-header btn btn-sm btn-danger">Delete</a>';
                        return $btn;
                    })
                    
                    ->filter(function ($instance) use ($request) {
                        if (!empty($request->get('search'))) {
                            $instance->where(function($w) use($request){
                                $search = $request->get('search');
                                $w->orWhere('name', 'LIKE', "%$search%")->orWhere('header_type', 'LIKE', "%$search%");
                            });
                        }
                    })
                    
                    ->rawColumns(['Actions'])
                    ->make(true);
            }
            else{
                return view('admin.home-header.index');
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function home_header_add(){
        return view('admin.home-header.add');
    }
    
    public function home_header_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('assets/images/headers'), $name);
                $data['image'] = url('public/'.'assets/images/headers/'.$name);
            }
            
            Header::insert($data);
            Session::flash('success','Successfully added blog details!');
            return redirect('/admin/home_header');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function home_header_show($id){
        $header = Header::find($id);
        return view('admin.home-header.edit',compact('header'));
    }
    
    public function home_header_update(Request $request, string $id){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('assets/images/headers'), $name);
                $data['image'] = url('public/'.'assets/images/headers/'.$name);
            }
            
            Header::find($id)->update($data);
            Session::flash('success','Successfully updated blog details!');
            return redirect('/admin/home_header');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    
    }
    
    public function home_header_delete(string $id){
        try{
            
            $header = Header::find($id)->delete();
            
        }catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // END-HOME HEADER _________________________________________________________    
    
    
    
    
    
    
    // HOME ____________________________________________________________________
    public function home(){
        $home = Home::first();
        $subheading = json_decode($home->subheadings);
        $seo = Seo::where('type','LIKE','home_page')->first();
        $home_choose = Home_Choose ::where('id','LIKe','%1%')->first();
        $home_choose1 = Home_Choose ::where('id','LIKe','%2%')->first();
        $home_choose2 = Home_Choose ::where('id','LIKe','%3%')->first();
        
        return view('admin.pages.home.edit',compact('home','seo','subheading','home_choose','home_choose1','home_choose2'));
    }
    
    public function home_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            unset($data['subheading1']);
            unset($data['subheading2']);
            unset($data['subheading3']);
            unset($data['subheading4']);
            unset($data['subheading5']);
            unset($data['subheading6']);
            
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            
            $subheadings = array(
                'sub_1' => $request->get('subheading1'),
                'sub_2' => $request->get('subheading2'),
                'sub_3' => $request->get('subheading3'),
                'sub_4' => $request->get('subheading4'),
                'sub_5' => $request->get('subheading5'),
                'sub_6' => $request->get('subheading6')
            );
            $data['subheadings'] = $subheadings;
            
            //image____________________
            if($request->file('image')){
                $name = $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('frontend/assets/images/new'), $name);
                $data['image'] = url('public/'.'frontend/assets/images/new/'.$name);
            }
            
            Home::where('id',$request->get('id'))->update($data);
            
            Seo::where('type','LIKE','home_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated home details!');
            return redirect('admin/home');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function home_update(Request $request){
        try{
            $data = $request->except('_token');
    
            if (isset($data['id'])) {
                // Image upload
                if ($request->hasFile('image3')) {
                    $image = $request->file('image3');
                    $name = $image->getClientOriginalName();
                    $image->move(public_path('assets/images/new/'), $name);
                    $data['image3'] = asset('assets/images/new/' . $name); // Use asset() to generate URL
                }
                
                if ($request->hasFile('image2')) {
                    $image = $request->file('image2');
                    $name = $image->getClientOriginalName();
                    $image->move(public_path('assets/images/slider/'), $name);
                    $data['image2'] = asset('assets/images/slider/' . $name); // Use asset() to generate URL
                }
                
                // Update footer
                Home::find($data['id'])->update($data);
                
                Session::flash('success', 'Successfully updated footer details!');
                return redirect('/admin/home');
            } else {
                Session::flash('error', 'Invalid data provided for update.');
                return redirect()->back();
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function home_choose_update(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            Home_Choose::find($data['id'])->update($data);
            Session::flash('success','Successfully updated home details!');
            return redirect('/admin/home');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // END-HOME ________________________________________________________________





    // General _________________________________________________________________
    public function general(Request $request){
        $general = SocialLinks::first();
        $footer = Footer::first();
        return view('/admin/general/edit', compact('general','footer'));
    }
    
    public function general_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            
            SocialLinks::find($data['id'])->update($data);
            Session::flash('success','Successfully updated social link details!');
            return redirect('/admin/general');
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    
    public function footer_post(Request $request){
        try{
            $data = $request->except('_token');
    
            if (isset($data['id'])) {
                // Image upload
                if ($request->hasFile('logo')) {
                    $logo = $request->file('logo');
                    $name = $logo->getClientOriginalName();
                    $logo->move(public_path('assets/images/'), $name);
                    $data['logo'] = asset('assets/images/' . $name); // Use asset() to generate URL
                }
                
                // Update footer
                Footer::find($data['id'])->update($data);
                
                Session::flash('success', 'Successfully updated footer details!');
                return redirect('/admin/general');
            } else {
                Session::flash('error', 'Invalid data provided for update.');
                return redirect()->back();
            }
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // End-General______________________________________________________________
    
    
    
    
    
    
    // Policy___________________________________________________________________
    public function policy(Request $request){
        $policy = PolicyTerms::where('type','LIKE','policy')->first();
        $seo = Seo::where('type','LIKE','policy_page')->first();
        return view('admin.pages.policy.edit', compact('policy','seo'));
    }
    
    public function policy_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            
            PolicyTerms::where('type','LIKE','policy')->update($data);
            
            Seo::where('type','LIKE','policy_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated privacy policy details!');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // End-Policy___________________________________________________________________
    
    
    
    
    
    
    
    // Terms___________________________________________________________________
    public function terms(Request $request){
        $terms = PolicyTerms::where('type','LIKE','terms')->first();
        $seo = Seo::where('type','LIKE','terms_page')->first();
        return view('admin.pages.terms.edit', compact('terms','seo'));
    }
    
    public function terms_post(Request $request){
        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['seo_title']);
            unset($data['seo_keyword']);
            unset($data['seo_description']);
            
            PolicyTerms::where('type','LIKE','terms')->update($data);
            
            Seo::where('type','LIKE','terms_page')->update([
                'seo_title' => $request->seo_title,
                'seo_keyword' => $request->seo_keyword,
                'seo_description' => $request->seo_description
            ]);
            
            Session::flash('success','Successfully updated terms & conditions details!');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('error', $e->getMessage()); 
            return redirect()->back();
        }
    }
    // End-Policy___________________________________________________________________
}