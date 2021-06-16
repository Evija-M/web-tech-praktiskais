@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            @foreach ( $artists as $artist )
                <p class='text-lg'>
                    <a>
                        {{ $artist->artist_name }} {{ $artist->year }} {{$artist->user_id}}
                    </a>
                </p>
            @endforeach
                            
            @auth
            <button type="button" class="btn btn-primary"><a href="{{ url('artist/create')}}">Create a new artist</a></button>
            @endauth
            @guest
                <p>Log in to create a new artist</p>
            @endguest
            </div>
        </div>
    </div>
</div>
    
@endsection