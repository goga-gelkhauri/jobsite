<?php

namespace App\Http\Controllers;

use App\Job;
use App\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:job-list');
         $this->middleware('permission:job-create', ['only' => ['create','store']]);
         $this->middleware('permission:job-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:job-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(5);
        return view('jobs.index',compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('jobs.create')->with('companies',$companies);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required',
            'location' => 'required'
        ]);


        Job::create($request->all());


        return redirect()->route('jobs.index')
                        ->with('success','Job created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        return view('jobs.show',compact('job'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $companies = Company::all();
        return view('jobs.edit',compact('job'))->with('companies',$companies);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {
         request()->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required'
        ]);


        $job->update($request->all());


        return redirect()->route('jobs.index')
                        ->with('success','Job updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $job->delete();


        return redirect()->route('jobs.index')
                        ->with('success','Job deleted successfully');
    }
}
