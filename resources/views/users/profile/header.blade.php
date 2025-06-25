<div class="row">
    <div class="col-4">
        @if ($user->avatar)
        <img src="{{ $user->avatar }}" alt="{{ $user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-ig">
        @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">{{ $user->name }}</h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id === $user->id)
                <a href="#" class="btn btn-outline-secondary btn-sm fw-bold">Edit Profile</a> 
                @else
                {{-- 観覧してきたuserがfollow or followerじゃないかを区別して、following or follow を表示させて、それぞれの処理を行う。 --}}
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark"><strong>{{ $user->posts->count() }}</strong>{{ $user->posts->count() == 1 ? "post" : "posts" }}</a>
            </div>
            <div class="col-auto">
                <a href="#" class="text-decoration-none text-dark"><strong>{{ $user->followers->count() }}</strong>{{ $user->followers->count() == 1 ? "follower" : "followers" }}</a>
            </div>
            <div class="col-auto">
                <a href="#" class="text-decoration-none text-dark"><strong>{{ $user->following->count() }}</strong>following</a>
            </div>
        </div>

        <p class="fw-bold">{{ $user->introduction }}</p>
    </div>
</div>

@if (request()->is('profile/*/show') || request()->is('profile/*/show/*'))
<div class="row justify-content-center align-items-center mt-3 mb-3">
    <div class="col-auto">
        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark {{ request()->is('profile/*/show') ? 'lead fw-bold' : '' }}">Post</a>
    </div>
    <div class="col-auto">
        <span class="h2 text-secondary border border-secondary-subtle"></span></div>
        <div class="col-auto">
            <a href="#" class="text-decoration-none text-dark {{ request()->is('profile/*/show/liked') ? 'lead fw-bold' : '' }}">Liked Posts</a>
        </div>
    <div class="col-auto">
        <span class="h2 text-secondary border border-secondary-subtle"></span></div>
        <div class="col-auto">
            <a href="#" class="text-decoration-none text-dark">Post</a>
        </div>
</div>
<hr class="mt-2">
    
@endif