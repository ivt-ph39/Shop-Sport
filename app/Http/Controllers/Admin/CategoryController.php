<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Repositories\Eloquent\CategoryRepository;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepository $category)
    {
        $this->categoryRepo = $category;
    }

    public function index()
    {
        // $categories = $this->categoryRepo->all();
        $categories = DB::table('categories')->paginate(5);
        return view('admin.categories.list', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepo->all();
        return view('admin.categories.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $this->categoryRepo->create($request->all());

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
        $category = $this->categoryRepo->find($id);
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
        $category = $this->categoryRepo->find($id);
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
        $this->categoryRepo->xoa($id);

        return redirect()->route('admin.categories.list');
    }

    public function listProductByCategoryID($id){
        
        $category = Category::with('products')->find($id);     
    
        return view('admin.categories.list-product',compact('category'));
    }
    
}
