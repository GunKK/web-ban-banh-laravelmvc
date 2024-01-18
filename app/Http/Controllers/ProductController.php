<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $limit = (int)$request->limit == 0  ? 6 : $request->limit;
        $sortASC = (int)$request->sortASC == 0 ? "ASC": "DESC";
        $q = (String)$request->q;
        $categoryId = (int)$request->categoryId;

        $categoryId = $request->categoryId;

        $products = Product::with('category')
                    ->categoryId($categoryId)
                    ->WhereLike('name', $q)
                    ->orWhereLike('description', $q)
                    ->orderBy("price_base", $sortASC)
                    ->paginate($limit)->withQueryString();
        $count = count($products);
        return view('customers.products.index', compact('products', 'count', 'limit', 'sortASC', 'q', 'categoryId'));
    }

    public function show($id): View
    {
        $product = Product::with('category')->findOrFail($id);
        $categoryId = $product->category->id;
        $sameProducts = Product::where('category_id', $categoryId)->latest()->take(5)->get();
        $comments = Comment::with('user')->where('parent_id', null)->where('product_id', $id)->get();

        return view('customers.products.show', compact('product', 'sameProducts', 'comments'));
    }
}
