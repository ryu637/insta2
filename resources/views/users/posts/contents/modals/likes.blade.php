<div class="modal fade" id="like-modal-{{ $post->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h2 class="h4 fw-bold text-primary text-center">Users who liked this post</h2>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center px-2">
                    <div class="col-12">
                        @foreach ($post->likes as  $like)
                            <div class="row align-items-center mb-3">
                                <div class="col-auto">
                                    <a href="#">
                                        @if ( $like->user && $like->user->avatar)
                                        <img src="{{ $like->user->avatar }}" alt="{{ $like->user->name}}" class="rounded-circle avatar-md">
                                        @else
                                         <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                                        @endif
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>