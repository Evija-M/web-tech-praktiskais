@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\AlbumController::class, 'update']) }}" style="margin-left: 40px">
    @csrf
    <div class="mb-3">
      <label for="album_name" class="form-label">{{ __('messages.Album name') }}</label>
      <input type="text" class="form-control w-25" id="album_name" name="album_name" value="{{$album->album_name}}" required autofocus>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">{{ __('messages.Year') }}</label>
        <input type="number" class="form-control w-25" id="year" name="year" value="{{$album->year}}" required autofocus>
    </div>

    <div class="mb-3">
      <label for="design" class="form-label">{{ __('messages.Design') }}</label>
      <input type="text" class="form-control w-50" id="design" name="design" value="{{$album->design}}" required autofocus>
  </div>

    <div class="mb-3">
        <input type="hidden" class="form-control" id="artist_id" name="artist_id" value="{{$artist_id}}">
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::id()}}">
        <input type="hidden" class="form-control" id="id" name="id" value="{{$album->id}}">

    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.Save changes') }}</button>
  </form>
    
@endsection