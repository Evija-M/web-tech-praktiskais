@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                {{-- @if (!isset($message)) --}}
                    @if ($artists->count() == 0 )
                        @if ($message == "")
                        <h4 style="margin-left: 30px">{{ __('messages.There are no artists yet, create the first one') }}</h4>
                        @else
                            <h4 style="margin-left: 30px">{{$message}}</h4>
                        @endif
                    

                    @else 
                    <div class="bd-example"><ul class="list-group" style="margin-left: 30px">
                        
                    @foreach ( $artists as $artist )
                        <li class="list-group-item w-25"><a href="{{url('artists', $artist)}}" > 
                            {{ $artist->artist_name }} 
                            
                        </a>({{ $artist->year }})</li>
                        </p>
                    @endforeach

                {{-- @else
                    <h4>{{$message}}</h4> --}}
                {{-- @endif --}}
                
        </ul>
</div>
            @endif
            @auth
            <button type="button" class="btn btn-primary btn-link" style="margin-left: 20px"><a class="text-decoration-none" style="color: white" href="{{ url('artists/create')}}">{{ __('messages.Create a new artist') }}</a></button>
            @endauth
            @guest
                <h5 style="margin-left: 40px">{{ __('messages.Log in to create a new artist') }}</h5>
            @endguest

            </div>
        </div>
    </div>
</div>
    
@endsection