<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['seeker','verified']);
    }

    public function index(){
        return view('Profile.index');
    }
    public function store(Request $request){
        $this->validate($request, [
           'address'=>'required',
           'phone_number'=>'required|numeric',
           'experience'=>'required|min:20',
           'bio'=>'required|min:20',
        ]);
        $user_id = Auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
           'address'=> request('address'),
           'phone_number'=> request('phone_number'),
           'experience'=> request('experience'),
           'bio'=> request('bio'),
        ]);
        return redirect()->back()->with('massage', 'Profile updated successful');
    }

    public function coverletter(Request $request){
        $this->validate($request, [
            'cover_letter'=>'required|mimes:doc,pdf,docs|max:2048',
        ]);
        $user_id = Auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter'=> $cover,
        ]);
        return redirect()->back()->with('massage', 'Cover Letter updated successful');
    }

    public function resume(Request $request){
        $this->validate($request, [
           'resume'=>'required|mimes:doc,pdf,docs|max:2048',
        ]);
        $user_id = Auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume'=> $resume,
        ]);
        return redirect()->back()->with('massage', 'Resume Letter uploaded successful');
    }
    public function avatar(Request $request){
        $this->validate($request, [
           'avatar' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user_id = Auth()->user()->id;
        if ($request->hasFile('avatar')){
            $file= $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $fileName = time().'.'.$text;
            $file -> move('uploads/avatar', $fileName);
        }
        Profile::where('user_id', $user_id)->update([
            'avatar'=> $fileName,
        ]);
        return redirect()->back()->with('massage', 'Profile picture uploaded successful');
    }
}
