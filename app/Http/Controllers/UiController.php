<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\Contact;
use App\ContactInfo;
use App\Post;
use App\Company;

class UiController extends Controller
{
    //

    public function index()
    {
        $jobs = Job::all();
        $categories = Category::all();
        $posts = Post::all()->take(9); 
        return view('ui.main')->with('jobs',$jobs)->with('categories',$categories)->with('posts',$posts);
    }

    public function alljobs()
    {
        $jobs = Job::all();
        $categories = Category::all();
        return view('ui.alljobs')->with('jobs',$jobs)->with('categories',$categories);
    }

    public function filterjob(Request $request)
    {
        $jobs = Job::all();
        if($request->has('content'))
        {
            $jobs = $jobs->where('title','like','%' . $request['content'] . '%');
            dd($jobs);
        }
        if($request['location'] != '')
        {
            $jobs = $jobs->where('location',$request['location']);
            dd($jobs);
        }
        $categories = Category::all();
        return view('ui.alljobs')->with('jobs',$jobs)->with('categories',$categories);
    }


    public function singleJob($id)
    {
        $job = Job::findOrFail($id);
        return view('ui.singleJob',compact('job'));
    }

    public function contact()
    {
        $contactinfo = ContactInfo::first();
        return view('ui.contact')->with('contactinfo',$contactinfo);
    }

    public function company($query = null)
    {
        if($query != null)
        {
            $companies = Company::where('name', 'like', $query . "%")->get();
            //dd($companies);

        }else{

            $companies = Company::all();
        }
        return view('ui.company')->with('companies',$companies);
    }

    public function contactUs(Request $request)
    {
        request()->validate([
            'fullName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
            ]);
            
           

        Contact::create($request->all());


        return redirect()->back()
                        ->with('success','Your question saved successfully.');
    }

    public function about()
    {
       
        return view('ui.about');
    }

    public function blog()
    {
        $posts = Post::all();
        return view('ui.posts')->with('posts',$posts);
    }

    public function singlecompany($id)
    {
        $company = Company::find($id);
        
        return view('ui.singlecompany')->with('company',$company);
    }
}
