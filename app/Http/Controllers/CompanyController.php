<?php

namespace App\Http\Controllers;
use App\Job;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct()
    {
         //$this->middleware('employee');
    }

    public function index($id, Company $company){
        return view('Company.index', compact('company'));
    }

    public function create(){
        return view('Company.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'phone'=> 'required|numeric',
            'website'=> 'required',
            'slogan'=> 'required',
            'description'=> 'required',
        ]);
        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'=> request('address'),
            'phone'=> request('phone'),
            'website'=> request('website'),
            'slogan'=> request('slogan'),
            'description'=> request('description'),
        ]);
        return redirect()->back()->with('massage', 'Company Profile updated successful');
    }

    public function coverPhoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user_id = Auth()->user()->id;
        if ($request->hasFile('cover_photo')){
            $file= $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file -> move('uploads/coverphoto', $fileName);
        }
        Company::where('user_id', $user_id)->update([
            'cover_photo'=> $fileName,
        ]);
        return redirect()->back()->with('massage', 'Company cover photo uploaded successful');
    }

    public function logo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user_id = Auth()->user()->id;
        if ($request->hasFile('logo')){
            $file= $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file -> move('uploads/logo', $fileName);
        }
        Company::where('user_id', $user_id)->update([
            'logo'=> $fileName,
        ]);
        return redirect()->back()->with('massage', 'Company logo uploaded successful');
    }

    public function company(){
        $companies=Company::paginate(20);
        return view('Company.company',compact('companies'));
    }
}
