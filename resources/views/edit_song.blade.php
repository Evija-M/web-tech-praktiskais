@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\SongController::class, 'update']) }}" style="margin-left: 40px">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Song title</label>
      <input type="text" class="form-control" id="title" name="title" :value="old('title')" required autofocus>
    </div>

   
    <div class="mb-3">
        <input type="hidden" class="form-control" id="artist_id" name="artist_id" value="{{$artist_id}}">
        <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{$album_id}}">
        <input type="hidden" class="form-control" id="song_id" name="song_id" value="{{$song_id}}">

    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.Save changes') }}</button>
  </form>
    
@endsection