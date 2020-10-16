<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class MenuBarController extends Controller
{
    public function index()
    {
       $categories = Category::all();
        return $categories;

       return view('layouts.sidebar',compact('categories'));
    }
    
}
