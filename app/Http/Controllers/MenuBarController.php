<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class MenuBarController extends Controller
{
    public function index()
    {
       $categories = Category::all();
<<<<<<< HEAD
=======
        return $categories;
>>>>>>> 58cb0906e0b582967da5a150b48dbdc1f2c80220

       return view('layouts.sidebar',compact('categories'));
    }
    
}
