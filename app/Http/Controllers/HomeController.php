<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{ContactUs,Seo,AboutUs,Blog,PolicyTerms};
use URL;
class HomeController extends Controller
{
    public function index()
    {
        $courses_levels= \DB::table('courses_levels')->select('*')->where('status','LIKE','Active')->orderBy('id','asc')->get();
        $home = \DB::table('home')->select('*')->first();
        $courses = \DB::table('courses')->select('*')->where('course_type','LIKE','Courses')->get();
        
        $seo =\DB::table('seo')->select('*')->where('type', 'home_page')->first();
        $blogs = \DB::table('blogs')->select('*')->take(3)->orderby('id', 'DESC')->get();

        return view('pages.home', compact('courses_levels','home','courses', 'seo' ,'blogs'));
    }
    
    
    public function About()
    {
        $seo =\DB::table('seo')->select('*')->where('type', 'about_page')->first();
        $about = AboutUs::first(); 

        return view('pages.about', compact('about', 'seo'));
    }

   
    public function Blog()
    {
        $blogs =\DB::table('blogs')->select('*')->get();
        return view('pages.blog',compact('blogs'));
    }
    
    
    public function Blog_Show($id)
    {
        $blog = Blog::find($id);
        return view('pages.blog_detail',compact('blog'));
    }
    

    public function Contact()
    {
        $seo =\DB::table('seo')->select('*')->where('type', 'contact_page')->first();
        return view('pages.contact', compact( 'seo'));
    } 

    public function policy()
    {
        $policy = PolicyTerms::where('type','LIKE','policy')->first();
        return view('pages.policy', compact('policy'));
    }
    
    
    public function terms()
    {
        $terms= PolicyTerms::where('type','LIKE','terms')->first();
        return view('pages.terms', compact('terms'));
    }


    public function SiteMap(Request $reqeust)
    {
        $urls = [];

        $urls[] = URL::to('/');
    
        $routes = \Route::getRoutes(); 
        foreach ($routes as $route) {
           
            $urls[] = URL::to($route->uri());
        }

        $xml = view('sitemap', compact('urls'))->render();
    
       
        return response($xml)->header('Content-Type', 'application/xml');
    
    }
}
