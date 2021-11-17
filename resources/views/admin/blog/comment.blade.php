<div class="row layout-top-spacing">
    <div id="comment" class="col-xl-12 col-lg-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>
                            Comments ({{ $blog->comment->count() + $blog->commentreply->count() }})
                        </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('comment.blog', $blog->id) }}" method="POST">
                    @csrf
                    <div class="input-group mb-4">
                        <textarea type="text" class="form-control" name="message" placeholder="Type your comment..."></textarea>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Comment</button>
                        </div>
                    </div>
                </form>

            @foreach($blog->comment as $comment)
            <div class="row mt-4">
                <div class="col-md-1 col-2">
                    <div class="avatar avatar-sm">
                        @if($comment->user->image)
                            <img alt="avatar" src="{{ asset('storage/app/public/'.$comment->user->image) }}" class="rounded-circle" style="height: 40px;" />
                        @else
                            <img alt="avatar" src="{{ asset('public/backend/assets/img/90x90.jpg') }}" class="rounded-circle" style="height: 40px;" />
                        @endif
                    </div>
                </div>
                <div class="col-md-11 col-10">
                    <div class="comment-text">
                        <a href="{{ url('admin/user-profile/'.$comment->user->slug) }}" class="font-weight-bold">{{ $comment->user->fullname }}</a><br>
                        <span>{!! $comment->message !!}</span><br>
                        @if($user->id == $comment->user->id)
                        <a href="javascript:void(0);" class="text-primary collapsible mr-2">edit</a>
                            <form class="mt-3 content" action="{{ route('update-comment.blog', $comment->id) }}" style="display: none;" method="POST">
                                @csrf
                                <div class="input-group mb-4">
                                    <textarea type="text" class="form-control" name="message" placeholder="Type your comment..." rows="1">{!! $comment->message !!}</textarea>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>

                            <a href="{{ route('delete-comment.blog', $comment->id) }}" class="text-danger delete-alert mr-2">delete</a>

                        @endif
                        <a href="javascript:void(0);" class="text-success collapsible">reply</a>
                        <form class="mt-3 content" action="{{ route('reply-comment.blog', $comment->id) }}" id="replyComment" style="display: none;" method="POST">
                            @csrf
                            <div class="input-group mb-4">
                                <textarea type="text" class="form-control" name="message" placeholder="Type your comment..." rows="1"></textarea>
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm" type="submit">Reply</button>
                                </div>
                            </div>
                        </form>
                        <small> . {{ $comment->created_at->diffForHumans() }}</small>

                        @foreach($comment->commentreply as $reply)
                        <div class="row mt-4">
                            <div class="col-md-1 col-2">
                                <div class="avatar avatar-sm">
                                    @if($reply->user->image)
                                        <img alt="avatar" src="{{ asset('storage/app/public/'.$reply->user->image) }}" class="rounded-circle" style="height: 40px;" />
                                    @else
                                        <img alt="avatar" src="{{ asset('public/backend/assets/img/90x90.jpg') }}" class="rounded-circle" style="height: 40px;" />
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-11 col-10">
                                <div class="comment-text">
                                    <span class="font-weight-bold">{{ $reply->user->fullname }}</span><br>
                                    <span>{!! $reply->message !!}</span><br>
                                    @if($user->id == $reply->user->id)
                                        <a href="javascript:void(0);" class="text-primary collapsible">edit</a>
                                        <form class="mt-3 content" action="{{ route('update-reply-comment.blog', $reply->id) }}" style="display: none;" method="POST">
                                            @csrf
                                            <div class="input-group mb-4">
                                                <textarea type="text" class="form-control" name="message" placeholder="Type your comment..." rows="1">{!! $reply->message !!}</textarea>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </div>
                                        </form>

                                        <a href="{{ route('delete-reply-comment.blog', $reply->id) }}" class="text-danger delete-alert ml-2">delete</a>

                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


</div>
