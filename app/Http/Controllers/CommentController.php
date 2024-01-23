<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function findByParentId(Request $request) {

        $parentId = $request->id;
        $product = Product::find($request->product_id);
        $replies = Comment::with('user')->findByParentId($parentId)->get();

        return response()->json([
            'replies'=> view('customers.products.partials.comment_recurse', ['comments' => $replies, 'product' => $product])->render()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCommentRequest $request)
    {
        $parentId = $request->has('parentId') ? $request->parentId : null;
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $parentId;
        $comment->product_id = $request->productId;
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('product.show', ['id' => $request->productId])->with('success', 'Bình luận thành công');
    }

    public function update(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('product.show', ['id' => $request->productId])->with('success', 'Cập nhật bình luận thành công');
    }

    public function destroy(Request $request, string $id)
    {
        $comment = Comment::findOrFail($id)->delete();
        return redirect()->route('product.show', ['id' => $request->productId])->with('success', 'Xóa bình luận thành công');
    }

    public function forceDelete(Request $request, string $id)
    {
        Comment::findOrFail($id)->forceDelete();
        return redirect()->route('product.show', ['id' => $request->productId])->with('success', 'Xóa bình luận thành công');
    }
}
