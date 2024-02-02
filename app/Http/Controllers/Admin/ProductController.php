<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $products = Cache::remember('products-page-' . request('page', 1), 3600, function() {
            return Product::with('category')->orderBy("id", "ASC")->paginate(6);
        });
        // $products = Product::with('category')->orderBy("id", "ASC")->paginate(6);
        return view('admins.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admins.products.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product($request->validated());
        $product->price_sale = $request->price_sale ?? null;
        $product->save();
        session()->flash('success','Thêm sản phẩm thành công');
        return redirect()->route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id): View
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admins.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request,string $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('product.edit', ['id' => $id])->with('success','Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success','Xóa sản phẩm thành công');
    }

    public function onlyTrashed() {
        $products = Product::onlyTrashed()->paginate(6);
        return view('admins.products.trashed', compact('products'));
    }

    public function restore(string $id) {
        Product::withTrashed()->find($id)->restore();
        return redirect()->route('product.onlyTrashed')->with('success','Khôi phục sản phẩm thành công');
    }
}
