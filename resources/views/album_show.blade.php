@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            
                    <p><img src="{{$album->design}}" alt="image" style="width: 200; height: 200; margin-left: 20px"></p>
                    <p class='text-lg' style="margin-left: 30px"> <a href="{{url('artists', $artist->id)}}" > 
                        {{ $artist->artist_name }}
                    </a></p>
                <p class='text-lg' style="margin-left: 30px">
                    <a href="{{url('albums', $album)}}" style="font-size: 30px"> 
                        {{ $album->album_name }} {{ $album->year }}
                    </a>
                    @isset($songs)
                        <ul>
                        @foreach ($songs as $song)
                        <li class="list-group-item w-25"><a href="{{url('songs/show', $song->id)}}">{{$song->title}}</a></li>
                        @endforeach
                        @endisset 
                    </ul>
                        <p>

                        @auth
                        @if (Auth::id() == $album->user_id)
                        <button type="button" class="btn btn-primary btn-md" style="margin: 10px; margin-left: 40px"><a class="text-decoration-none" style="color: rgb(255, 255, 255); margin: 3px" href="{{ url('songs/create', $album)}}">{{ __('messages.Add a new song') }}</a></button>
                        <button type="button" class="btn btn-primary btn-md" style="margin: 10px"><a class="text-decoration-none" style="color: white" href="{{ url('albums/edit', $album->id)}}">{{ __('messages.Edit album') }}</a></button>
                     
                            <form action="{{ url('albums/destroy',  $album) }}" method="post">
                                <input class="btn btn-primary btn-md" type="submit" value="{{ __('messages.Delete album') }}" style="margin-left: 40px" />
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                      
                        @endif
                        @endauth

                        <div class="row" style="margin-top: 10px">
                            <div class="w-45" >
                                <div class="card" style="width: 500px; margin-left: 50px">                  
                                  <div class="card-body">
                                    <h5 class="card-title" style="color: black">{{ __('messages.Rate the album') }}</h5>
                                

                                    <form method="POST" action="{{ action([App\Http\Controllers\AlbumController::class, 'rate']) }}">
                                        @csrf

                                        <table class="table table-sm">
                                            <tbody>
                                                <thead>{{ __('messages.Select') }}</thead>
                                            <tr>
                                              <td><input type="radio" name="rating" class="form-check-input" id="1" value="1" style="margin-left: 20px">
                                        <label class="form-check-label" for="1">1</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="2" value="2" style="margin-left: 20px">
                                        <label class="form-check-label" for="2">2</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="3" value="3" style="margin-left: 20px">
                                        <label class="form-check-label" for="3">3</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="4" value="4" style="margin-left: 20px">
                                        <label class="form-check-label" for="4">4</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="5" value="5" style="margin-left: 20px">
                                        <label class="form-check-label" for="5">5</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="6" value="6" style="margin-left: 20px">
                                        <label class="form-check-label" for="6">6</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="7" value="7" style="margin-left: 20px">
                                        <label class="form-check-label" for="7">7</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="8" value="8" style="margin-left: 20px">
                                        <label class="form-check-label" for="8">8</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="9" value="9" style="margin-left: 20px">
                                        <label class="form-check-label" for="9">9</label></td>
                                            </tr>
                                            <tr>
                                                <td><input type="radio" name="rating" class="form-check-input" id="10" value="10" style="margin-left: 20px">
                                        <label class="form-check-label" for="10">10</label></td>
                                            </tr>
                                                
                                            
                                            </tbody>
                                          </table>
                                    

                                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::id()}}">
                                        <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{$album->id}}">

                                        @auth
                                            
                                        @if ($rating!=null)
                                            <h6>{{ __('messages.You have rated this album already') }}</h6> 
                                            <h6>{{ __('messages.Your rating is') }} {{$rating->rating}}</h6>
                                        @else
                                            <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                                        @endif
                                        @endauth

                                        @guest
                                            <h5>Log in to rate an album</h5>
                                        @endguest

                                        
                                    </form>
                                  </div>
                                </div>
                            </div>


                            <div class="col w-70" style="margin-right: 20px">
                              <div class="card">                  
                                <div class="card-body">
                                  <h5 class="card-title">{{ __('messages.Comments') }}</h5>
                                  <p class="card-text">

                                    @isset($comments)
                                    @foreach ($comments as $comment)
                                    <li class="list-group-item">
                                        {{$comment->content}}
                                    </li>
                                    
                                    @endforeach
                                    @endisset
                                  </p>
                                  @auth 
                        
                        @csrf
                        <button type="button" class="btn btn-primary btn-sm" onClick="add()"><a class="text-decoration-none" style="color: rgb(255, 255, 255)">
                           {{ __('messages.Add a new comment') }}</a>
                        </button>
                        

                        <form method="POST" action="{{ action([App\Http\Controllers\CommentController::class, 'store']) }}" id="form" style="display: none" class="w-25 p-3">
                            @csrf
                            <div class="col-lg-30">
                                <textarea class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 68px;" id="content" placeholder="Share your thoughts" name="content" :value="old('content')" required autofocus></textarea>
                                {{-- <input type="text" class="form-control form-control-lg-100" id="content" placeholder="Share your thoughts" name="content" :value="old('content')" required autofocus> --}}
                            </div>
                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{Auth::id()}}">
                                <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{$album->id}}">
                                <input type="hidden" class="form-control" id="song_id" name="song_id" value="{{null}}">
                            <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                          </form>

                        @endauth

                                     @guest
                                            <h5>{{ __('messages.Log in to comment') }}</h5>
                                        @endguest
                                </div>
                              </div>
                            </div>

                            
                            
                          </div>
                        </p>
                    </p>
            </div>
        </div>
    </div>
</div>

<script>
    //var form = document.getElementById("form");
    function add() {
        var x = document.getElementById("form");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>

 
    
@endsection

