<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class MenuBarController extends Controller
{
    public function index()
    {
       $category = Category::all();

       return view('layouts.sidebar',compact('category'));
    }
    
}
