@if (count($comments) !== 0 )
    @foreach ( $comments as $comment )
        <div class="ps-3 pe-3 pt-2">
            <div class="media-body border-bottom border-secondary">
                <span class="h5">{{ $comment->user->name }}</span>
                <p class="mt-3 ms-2">
                    <span class="text-success">Nội dung</span>: {{ $comment->content }}
                </p>
                <div class="ms-4">
                    <p>
                        <button class="btn btn-light btn-get-reply" data-id="{{ $comment->id }}" type="button" data-bs-toggle="collapse" data-bs-target="#comment-{{ $comment->id }}" aria-expanded="false" aria-controls="comment-{{ $comment->id }}">
                            Xem thêm phản hồi
                        </button>

                        <button type="button"
                            @if (Auth::check())
                                class="btn btn-light"
                            @else
                                class="btn btn-light disabled"
                            @endif
                            data-bs-toggle="modal" data-bs-target="#create-reply-form-{{ $comment->id}}"
                        >
                            <i class="fa-regular fa-comment"></i>
                        </button>

                        @include('customers.products.partials.create_reply_modal')
                    </p>
                    <div class="collapse" id="comment-{{ $comment->id }}">
                        {{-- container replies --}}
                        <div class="card card-body" id="reply-of-{{ $comment->id }}"></div>
                    </div>
                </div>
                <p>
                    <i class="fa-solid fa-clock"></i>
                    <small> {{ $comment->created_at }} </small>
                    @if (Auth::check() && Auth::user()->id === $comment->user_id)

                        <div class="d-flex">
                            <button type="button"
                                class="ms-2 btn btn-light"
                                data-bs-toggle="modal" data-bs-target="#update-comment-form-{{ $comment->id }}" >
                                <i class="fa-sharp fa-solid fa-circle-star"></i>
                                <i class="fa-solid fa-pen"></i>
                            </button>
                            <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                <button class="ms-1 btn btn-light" type="submit"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>

                        {{-- comment update modal --}}
                        <div class="modal fade" id="update-comment-form-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="{{ route('comment.update', ['id' => $comment->id]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá bài viết</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="titleReview" class="form-label">Form chỉnh sửa bài viết</label>
                                                <input type="hidden" name="commentId" value="{{ $comment->id}}">
                                                <input type="hidden" name="productId" value="{{ $product->id }}">
                                            </div>
                                            <div class="form-floating">
                                                <textarea
                                                    class="form-control"
                                                    placeholder="Leave a comment here"
                                                    name="content"
                                                    id="content"
                                                    style="height: 100px"
                                                >{{ $comment->content}}</textarea>
                                                <label for="content">Đánh giá</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" name="review" class="btn btn-success">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </p>
            </div>
        </div>
    @endforeach
@endif
