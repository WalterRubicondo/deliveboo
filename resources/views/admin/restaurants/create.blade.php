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
          <form action="{{route('admin.restaurants.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}">
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
              <label for="tag">Category</label>
              <select class="form-control @error('genre_ids') is-invalid @enderror" id="genre" name="genre_ids[]" multiple>
              @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->name}}</option>
              @endforeach
              </select>
              @error('genre_ids')
                <small class="text-danger">{{ $message }}</small>
              @enderror
             </div>

            <div class="form-group">
              <label for="open_hour">Open Hour</label>
              <input class="form-control @error('open_hour') is-invalid @enderror" id="open_hour" type="time" name="open_hour" value="{{ old('open_hour') }}">
              @error('open_hour')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="close_hour">Close Hour</label>
              <input class="form-control @error('close_hour') is-invalid @enderror" id="close_hour" type="time" name="close_hour" value="{{ old('close_hour') }}">
              @error('close_hour')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="restaurant_address">Restaurant Address</label>
              <input class="form-control @error('restaurant_address') is-invalid @enderror" id="restaurant_address" type="text" name="restaurant_address" value="{{ old('restaurant_address') }}">
              @error('restaurant_address')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>

            <div class="form-group">
              <label for="photo">Photo</label>
              <input class="form-control-file @error('photo') is-invalid @enderror" id="photo" type='file' name="photo">
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