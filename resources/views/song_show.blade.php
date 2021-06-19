@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            
                            <li class="list-group-item"><a href="{{url('songs/show', $song->id)}}"></a>{{$song->title}}</li>
                        <p>

                        @auth
                        @if (Auth::id() == $user->user_id)
                        {{-- <button type="button" class="btn btn-primary btn-md" style="margin: 10px"><a class="text-decoration-none" style="color: rgb(255, 255, 255); margin: 3px" href="{{ url('songs/create', $album)}}">{{ __('messages.Add a new song') }}</a></button> --}}
                        <button type="button" class="btn btn-primary btn-md" style="margin: 10px"><a class="text-decoration-none" style="color: white" href="{{ url('songs/edit', $song->id)}}">{{ __('messages.Edit song') }}</a></button>

                        <div>
                            <form action="{{ url('songs/destroy',  $song) }}" method="post">
                                <input class="btn btn-primary btn-md" type="submit" value="Delete song" style="margin: 10px" />
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                        </div>
                        @endif
                        @endauth

                        <div class="row">
                            <div class="col w-70">
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
                                <input type="hidden" class="form-control" id="album_id" name="album_id" value="{{null}}">
                                <input type="hidden" class="form-control" id="song_id" name="song_id" value="{{$song->id}}">
                            <button type="submit" class="btn btn-primary">{{ __('messages.Submit') }}</button>
                          </form>

                        @endauth
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

