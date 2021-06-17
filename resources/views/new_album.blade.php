@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\AlbumController::class, 'store']) }}">
    @csrf
    <div class="mb-3">
      <label for="album_name" class="form-label">{{ __('messages.Album name') }}</label>
      <input type="text" class="form-control" id="album_name" name="album_name" :value="old('album_name')" required autofocus>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">{{ __('messages.Year') }}</label>
        <input type="number" class="form-control" id="year" name="year" :value="old('year')" required autofocus>
    </div>

    <div class="mb-3">
        <label for="design" class="form-label">{{ __('messages.Design') }}</label>
        <input type="text" class="form-control" id="design" name="design" :value="old('design')" required autofocus>
    </div>

    <div class="mb-3">
        <input type="hidden" class="form-control" id="artist_id" name="artist_id" value="{{$artist_id}}">
    </div>
    <div class="mb-3">
      <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user_id}}">
  </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
  </form>
@endsection
