<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
class MyblogController extends Controller
{
    public function index(Posts $posts){
    	$data = $posts->orderBy('created_at','desc')->limit(4)->get();
    	return view('myblog', compact('data'));
    }
}
