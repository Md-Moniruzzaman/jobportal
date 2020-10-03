<?php

namespace App\Http\Controllers;

use App\Company;
use App\Job;

use Illuminate\Http\Request;
use Auth;

class JobController extends Controller
{
    public function __construct()
    {
       // $this->middleware('employee',['except'=>array('index')]);
    }
    public function index(){
        $jobs = Job::latest()->limit(10)->get();
        $companies = Company::latest()->limit(12)->get();
        return view('welcome', compact('jobs','companies'));
    }

    public function show($id, Job $job){
        return view('Job.show', compact('job'));
    }

    public function create(){
        return view('Job.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title'=> 'required',
            'roles'=> 'required',
            'description'=> 'required',
            'position'=> 'required',
            'address'=> 'required',
            'type'=> 'required',
            'last_dates'=> 'required',
        ]);
        $user_id = auth()->user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' =>$user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            //'category_id' => request('Category'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            //'status' => request('status'),
            'last_dates' => request('last_dates'),
        ]);
        return redirect()->back()->with('message', 'Job post uploaded successful');
    }

    public function myjobs(){
        $jobs = Job::where('user_id', auth()->user()->id)->get();
        return view('Job.myjobs', compact('jobs'));
    }
    public function edit($id){
        $user_id = auth()->user()->id;
        $jobs = Job::where('user_id', $user_id)->findOrFail($id);
        return view('Job.edit', compact('jobs'));
    }

    public function update($id){
        $user_id = auth()->user()->id;
        $jobs = Job::where('user_id', $user_id)->findOrFail($id);
        $jobs->title = request('title');
        $jobs->roles = request('roles');
        $jobs->description = request('description');
        $jobs->position = request('position');
        $jobs->address = request('address');
        $jobs->type = request('type');
        $jobs->status = request('status');
        //$jobs->last_dates = request('last_dates');
        $jobs->save();
        return redirect()->to('Job/myjobs');
    }

    public function delete($id){
        $user_id = auth()->user()->id;
        $jobs = Job::where('user_id', $user_id)->findOrFail($id);
        $jobs->delete();
        return redirect()->to('Job/myjobs');
    }

    public function apply(Request $request, $id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Job applied successful');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id', auth()->user()->id)->get();
        return view('Job.applicants', compact('applicants'));
    }
    public function alljobs(Request $request){
        $keyword = Request('title');
        $emp_type = Request('type');
        $category = Request('category_id');
        $address = Request('address');
        if($keyword || $emp_type || $category || $address){
          $jobs = Job::where('title','LIKE','%'.$keyword.'&')
                   ->orwhere('type', $emp_type)
                   ->orwhere('category_id', $category)
                   ->orwhere('address', $address)
                   ->paginate(10);
            return view('Job.alljobs', compact('jobs'));
        }else{
        $jobs = Job::paginate(10);
        return view('Job.alljobs', compact('jobs'));
        }
    }



}
