@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\SongController::class, 'store']) }}" style="margin-left: 40px">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">{{ __('messages.Song title') }}</label>
      <input type="text" class="form-control w-25" id="title" name="title" :value="old('title')" required autofocus>
    </div>


    <div class="mb-3">
        <input type="hidden" class="form-control" id="artist_id" name="artist_id" value="{{$artist_id->artist_id}}">
    </div>
    <div class="mb-3">
        <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{$album_id}}">
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
  </form>
@endsection
