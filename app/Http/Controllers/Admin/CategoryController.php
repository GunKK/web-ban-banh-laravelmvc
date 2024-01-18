<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy("id", "ASC")->paginate(6);
        return view('admins.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return redirect()->route('category.index')->with('success','Thêm danh mục thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admins.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('category.index')->with('success','Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(String $id)
    {
        if ($id !== "1") {
            $category = Category::findOrFail($id);
            $category->delete();
            Product::where('category_id', $id)->update(['category_id' => 1]);
            return redirect()->route('category.index')->with('success','Xóa thành công');
        } else {
            return redirect()->route('category.index')->with('error','Không thể xóa danh mục nay');
        }
    }

    public function onlyTrashed() {
        $categories = Category::onlyTrashed()->paginate(6);
        return view('admins.categories.trashed', compact('categories'));
    }

    public function restore(string $id) {
        Category::withTrashed()->find($id)->restore();
        return redirect()->route('category.onlyTrashed')->with('success','Khôi phục danh mục thành công');
    }
}
