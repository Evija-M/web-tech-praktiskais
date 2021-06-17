@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            
                    {{-- @php
                        var_dump($artist);
                    @endphp --}}
                <p class='text-lg'>
                    <a href="{{url('albums', $album)}}" > 
                        {{ $album->album_name }} {{ $album->year }} {{$album->design}}
                    </a>
                    @isset($songs)
                        
                        @foreach ($songs as $song)
                            {{-- @php
                            var_dump($album);
                        @endphp --}}
                                {{$song->title}} {{$song->year}}
                        @endforeach
                        @endisset
                        <p>
{{-- artists.userid = authid    albums.aristid = artist.id       --}}
                        @auth
                        @if (Auth::id() == $album->user_id)
                        <button type="button" class="btn btn-primary btn-sm"><a class="text-decoration-none" style="color: rgb(255, 255, 255)" href="{{ url('songs/create', $album)}}">{{ __('messages.Add a new song') }}</a></button>
                        <div>
                            <form action="{{ url('albums/destroy',  $album) }}" method="post">
                                <input class="btn btn-primary btn-sm" type="submit" value="{{ __('messages.Delete album') }}" />
                                <input type="hidden" name="_method" value="delete" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>

                        </div>
                        @endif

                        @endauth
                        </p>
                    </p>
            </div>
        </div>
    </div>
</div>
    
@endsection