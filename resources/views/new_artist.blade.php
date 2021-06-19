@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\ArtistController::class, 'store']) }}" style="margin-left: 40px">
    @csrf
    <div class="mb-3">
      <label for="artist_name" class="form-label">{{ __('messages.Artist name') }}</label>
      <input type="text" class="form-control w-25" id="artist_name" name="artist_name" :value="old('artist_name')" required autofocus>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">{{ __('messages.Year') }}</label>
        <input type="number" class="form-control w-25" id="year" name="year" :value="old('year')" required autofocus>
    </div>

    <div class="mb-3">
      <label for="genre" class="form-label">{{ __('messages.Genre') }}</label>
      <input type="text" class="form-control w-25" id="genre" name="genre" :value="old('genre')" required autofocus>
  </div>

    <div class="mb-3">
        <input type="hidden" class="form-control " id="user_id" name="user_id" value="{{$user_id}}">
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
  </form>
    
@endsection
        