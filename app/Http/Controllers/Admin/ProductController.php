<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sale;
use Illuminate\Support\Facades\DB;
use Spatie\Searchable\Search;
use Spatie\Searchable\ModelSearchAspect;
use App\Repositories\Eloquent\ProductRepository;
use App\Http\Requests\StoreProductRequest;
class ProductController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepository $product)
    {
        $this->productRepo = $product;
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('images')->paginate(10);
        
        return view('admin.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        // dd($data);
        $this->productRepo->create($data);
       
        // $this->productRepo->create($data);
        return redirect()->route('admin.products.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepo->find($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = $this->productRepo->find($id);
        // DB::enableQueryLog();
        $data = $request->all();
        $product->update($data);
        // dd(DB::getQueryLog());
        return redirect()->route('admin.products.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepo->find($id);   
        $product->delete();       
        return redirect()->route('admin.products.list');
    }

    public function productDetail($id){
        $product = $this->productRepo->find($id);
        $sale =Sale::find($id);
        return view('admin.products.detail', compact(['product','sale']));
    }

    public function doUpload(Request $request){
        $file = $request->filesTest;

        $file->move('upload', $file->getClientOriginalName());

        return  redirect()->route('admin.products.list');
    }

    public function search(Request $request)
    {
        $searchterm = $request->input('query');

        $searchResults = (new Search())
            ->registerModel(\App\Product::class, ['name', 'description']) //apply search on field name and description
            ->perform($searchterm);

        return view('admin.products.list', compact('searchResults', 'searchterm'));
    }
}
