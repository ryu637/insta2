@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row gx-5">
    <div class="col-8">
        <div class="card mb-4">
            {{-- title  --}}
            @include('users.posts.contents.title');
            {{-- body  --}}
            @include('users.posts.contents.body');
        </div>
    </div>
    <div class="col-4">
        {{-- profile overview --}}
        {{-- suggestions --}}
    </div>
</div>

@endsection
