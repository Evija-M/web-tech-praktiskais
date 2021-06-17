@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <p class='text-lg'>
                    <a href="{{url('artists', $artist)}}" > 
                        {{ $artist->artist_name }} {{ $artist->year }}
                    </a>
                    @isset($albums)
                        
                        @foreach ($albums as $album)
                        <a href="{{url('albums', $album)}}" > 
                            {{$album->album_name}} {{$album->year}} {{$album->design}}
                        </a>
                        @endforeach
                        @endisset

                       
                    </p>
                    @auth
                    @if (Auth::id() == $artist->user_id)
                    <button type="button" class="btn btn-primary btn-sm"><a class="text-decoration-none" style="color: white" href="{{ url('albums/create', $artist)}}">{{ __('messages.Create a new album') }}</a></button>
                    <button type="button" class="btn btn-primary btn-sm"><a class="text-decoration-none" style="color: white" href="{{ url('artists/edit', $artist)}}">{{ __('messages.Edit artist') }}</a></button>
                    {{-- <button type="button" class="btn btn-primary btn-sm"><a class="text-decoration-none" style="color: white" href="{{ url('artists/destroy', $artist)}}">Delete artist</a></button> --}}

                    <form action="{{ url('artists/destroy',  $artist) }}" method="post">
                        <input class="btn btn-primary btn-sm" type="submit" value="{{ __('messages.Delete artist') }}" />
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