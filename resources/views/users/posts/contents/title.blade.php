<div class="card-header bg-white py-3">
    <div class="row align-items-center">
        <div class="col-auto">
            <a href="#">
                {{-- 画像があるなら画像を出す、なければアイコン --}}
                @if ($post->user->avatar)
                <img src="#" alt="" class="rounded-circle avatar-sm">
                @else
                    <i class="fa-solid fa-circle-user text-secondary icon-sm"></i>
                @endif
            </a>
        </div>
        <div class="col px-0">
            <a href="#" class="text-decoration-none text-dark">{{$post->user->name}}</a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle='dropdown'><i class="fa-solid fa-ellipsis"></i></button>
                @if (Auth::user()->id === $post->user->id)
                <div class="dropdown-menu">
                        <a href="{{ route('post.edit',$post->id) }}" class="dropdown-item"><i class="fa-regular fa-pen-to-square"></i>Edit</a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target='#delete-post-{{ $post->id}}'>
                            <i class="fa-regular fa-trash-can"></i>Delete
                        </button>
                </div>
                @include('users.posts.contents.modals.delete')
                @else
                <ul class="dropdown-menu"><li class="dropdown-item">unfollow</li></ul>
                @endif
            </div>
        </div>
    </div>
</div>