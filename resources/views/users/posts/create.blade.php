@extends('layouts.app')

@section('title', 'Crate Post')

@section('content')
    <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="category" class="form-label d-block fw-bold">Category <span class="text-muted fw-normal"></span> (up to 3)</label>

            {{-- foreach で　カテゴリーを全て表示させる。 --}}
            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" id="{{$category->name}}" value="{{$category->id}}" class="form-check-input">
                    <label for="{{$category->name}}" class="form-check-label">{{ $category->name }}</label>
                </div>
            @endforeach
            {{-- error --}}
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold ">Description</label>
            <textarea name="description" id="description" class="form-control" row="3" placeholder="What's on your mind">description</textarea>
           {{-- error  --}}
        </div>

        <div class="mb-4">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-describedby="image-info">
            <div id="image-info" class="form-text">
                The acceptable formats are jpeg, jpg, png, and  git only <br>
                Max file size is 1048KB.
            </div>
            {{-- error  --}}
        </div>

        <button type="submit" class="btn btn-primary px-5">Post</button>

    </form>
@endsection