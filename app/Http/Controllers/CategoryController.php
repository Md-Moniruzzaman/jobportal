<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryCreate(){
        return view('Category.categoryCreate');
    }

    public function index($id){
        $jobs= Job::where('category_id',$id)->paginate(20);
        $categoryName= Category::where('id',$id)->first();
        return view('Job.job-category',compact('jobs','categoryName'));
    }
    public function type($type){
        $jobs= Job::where('type',$type)->paginate(20);
        $typeName= Job::where('type',$type)->first();
        return view('Job.job-type',compact('jobs','typeName'));
    }
}
