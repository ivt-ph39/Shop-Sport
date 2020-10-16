<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Category::create($data);

        return redirect()->route('admin.categories.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::enableQueryLog();
        $category = Category::find($id);
        $data = $request->only('name');
        $category->update($data);
        return redirect()->route('admin.categories.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::enableQueryLog();
        $category = Category::find($id);
        // return $category->parent_id;
        if (!$category->parent_id) {
            $children = Category::find($id)->load('children')->children;
            // dd(DB::getQueryLog());
            foreach ($children as $child) {
                $categoryId = Category::find($child->id);
                $categoryId->delete();
            }
        }
        $category->delete();

        return redirect()->route('admin.categories.list');
    }
}
