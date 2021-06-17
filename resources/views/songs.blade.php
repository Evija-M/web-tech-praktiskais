@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($songs->count() == 0)
                    <div class="bd-example">{{ __('messages.There are no songs, go to albums and create the first one') }}</div>
                @else
                    
                <div class="bd-example"><ul class="list-group">
            @foreach ( $songs as $song )

            <li class="list-group-item"><a href="{{url('songs', $song)}}" > 
                {{ $song->title }} {{ $song->year }} {{$song->artist_id}}
            </a></li>
            @endforeach
        </ul>
    </div>
            @endif
                       
                            
           
            </div>
        </div>
    </div>
</div>
    
@endsection
