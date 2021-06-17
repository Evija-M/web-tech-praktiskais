@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($artists->count() == 0)
                <div class="bd-example">{{ __('messages.There are no artists yet, create the first one') }}</div>

                @else 
                <div class="bd-example"><ul class="list-group">
                    @foreach ( $artists as $artist )
                    <li class="list-group-item"><a href="{{url('artists', $artist)}}" > 
                        {{ $artist->artist_name }} {{ $artist->year }}
                        
                    </a></li>
                    </p>
                @endforeach
        </ul>
</div>
            @endif
            @auth
            <button type="button" class="btn btn-primary btn-link"><a class="text-decoration-none" style="color: white" href="{{ url('artists/create')}}">{{ __('messages.Create a new artist') }}</a></button>
            @endauth
            @guest
                <p>{{ __('messages.Log in to create a new artist') }}</p>
            @endguest

            </div>
        </div>
    </div>
</div>
    
@endsection