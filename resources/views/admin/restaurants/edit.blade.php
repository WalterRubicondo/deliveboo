@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New restaurant</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
          <form action="{{route('admin.restaurants.update', ['restaurant' => $restaurant->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" value="{{ $restaurant->name }}">
              @error('name')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="desciption">Desciption</label>
              <textarea class="form-control @error('desciption') is-invalid @enderror" id="desciption" name="desciption"> {{ old('desciption') }}</textarea>
              @error('desciption')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="open_hour">Open Hour</label>
              <input class="form-control @error('open_hour') is-invalid @enderror" id="open_hour" type="time" name="open_hour" value="{{ old('open_hour') }}" value="{{ $restaurant->open }}">
              @error('open_hour')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="close_hour">Close Hour</label>
              <input class="form-control @error('close_hour') is-invalid @enderror" id="close_hour" type="time" name="close_hour" value="{{ old('close_hour') }}" value="{{ $restaurant->close }}">
              @error('close_hour')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="restaurant_address">Restaurant Address</label>
              <input class="form-control @error('restaurant_address') is-invalid @enderror" id="restaurant_address" type="text" name="restaurant_address" value="{{ old('restaurant_address') }}" value="{{ $restaurant->address }}">
              @error('restaurant_address')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="photo">Photo</label>
              <input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo" value="{{ $restaurant->photo }}">
              @error('photo')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
          </form>
      </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>New post</h3>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
          <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                <option value="">Select</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{$category->name}}</option>
                @endforeach
              </select>
              @error('category')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="title">Title</label>
              <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title', $post->title) }}">
              @error('title')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"> {{ old('content', $post->content) }}</textarea>
              @error('content')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div>
              <img src="{{asset($post->cover)}}" alt="">
            </div>
            <div class="form-group">
              <label for="cover">Cover</label>
              <input class="form-control-file @error('cover') is-invalid @enderror" id="cover" type='file' name="cover">
              @error('cover')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="tag">Tags</label>
              <select class="form-control @error('tag_ids') is-invalid @enderror" id="tag" name="tag_ids[]" multiple>
                @foreach($tags as $tag)
                  <option value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'selected' : ''}}>{{$tag->name}}</option>
                @endforeach
              </select>
              @error('tag_ids')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <button class="btn btn-primary" type="submit">Save</button>
          </form>
      </div>
    </div>
</div>
@endsection --}}
