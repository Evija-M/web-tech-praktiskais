@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action([App\Http\Controllers\ArtistController::class, 'store']) }}">
    @csrf
    <div class="mb-3">
      <label for="artist_name" class="form-label">Artist name</label>
      <input type="text" class="form-control" id="artist_name" name="artist_name" :value="old('artist_name')" required autofocus>
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" :value="old('year')" required autofocus>
    </div>

    <div class="mb-3">
        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user_id}}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    
@endsection
        