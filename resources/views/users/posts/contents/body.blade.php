<div class="container p-0">
    <a href="#">
        <img src="{{$post->image}}" alt="post id{{$post->id}}" class="w-100">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">

        <div class="col-auto">
            @if ($post->isLiked())
            <form action="{{ route('like.delete',$post->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm p-0">
                    <i class="fa-solid fa-heart text-danger"></i>
                </button>
            </form>
            @else
            <form action="{{ route('like.store',$post->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm shadow-none p-0">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </form>
            @endif
        </div>
        
        <div class="col-auto px-0">
            <button class="bg-transparent border-0" data-bs-target="#like-modal-{{ $post->id }}" data-bs-toggle="modal">{{ $post->likes->count() }}</button>
            @include('users.posts.contents.modals.likes')
        </div>
        <div class="col text-end">
            @foreach ($post->categoryPosts as $category_post)
            <div class="badge bg-secondary bg-opacity-50">
                {{ $category_post->category->name }}
            </div>
            @endforeach
        </div>
    </div>
    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
    &nbsp;
    <p class="d-inline fw-light">{{ $post->description }}</p>
    <p class="text-uppercase text-muted xsmall">{{ date('M d. Y',strtotime($post->created_at)) }}</p>

    {{-- @include('users.posts.content.comments') --}}
</div>



