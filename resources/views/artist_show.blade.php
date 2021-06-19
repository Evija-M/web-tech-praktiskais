@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-left: 20px">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class='text-lg'>
                    <p style="font-size: 30px">
                    <a href="{{url('artists', $artist)}}" > 
                        {{ $artist->artist_name }} 
                    </a>({{ $artist->year }})
                </p>
                    @isset($albums)
                        <ul>
                            @foreach ($albums as $album)
                            <li class="list-group-item w-25">
                                <a href="{{url('albums', $album)}}" > 
                                    {{$album->album_name}} {{$album->year}}
                                </a>
                            </li>
                            @endforeach
                        @endisset

                        </ul>
                        

                       
                    </p>
                    @auth
                    @if (Auth::id() == $artist->user_id)
                    <button type="button" class="btn btn-primary btn-md"><a class="text-decoration-none" style="color: white; margin: 3px" href="{{ url('albums/create', $artist)}}">{{ __('messages.Create a new album') }}</a></button>
                    <button type="button" class="btn btn-primary btn-md"><a class="text-decoration-none" style="color: white;  margin: 3px" href="{{ url('artists/edit', $artist)}}">{{ __('messages.Edit artist') }}</a></button>
                    {{-- <button type="button" class="btn btn-primary btn-sm"><a class="text-decoration-none" style="color: white" href="{{ url('artists/destroy', $artist)}}">Delete artist</a></button> --}}

                    <form action="{{ url('artists/destroy',  $artist) }}" method="post" style=" margin: 3px">
                        <input class="btn btn-primary btn-md" type="submit" value="{{ __('messages.Delete artist') }}" />
                        <input type="hidden" name="_method" value="delete" />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>

                    @endif
                    @endauth
            </div>
        </div>
    </div>
</div>
    
@endsection