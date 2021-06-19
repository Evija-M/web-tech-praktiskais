@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200" style="margin-left: 40px">
                @if ($albums->count() == 0)
                <h4>{{ __('messages.There are no albums yet, go to artists and create the first one') }}</h4>
                @else
                    
                <div class="bd-example"><ul class="list-group">
            @foreach ( $albums as $album )
                    
            <li class="list-group-item w-25"><a href="{{url('albums', $album->id)}}" > 
                {{ $album->album_name }} 
                
            </a>({{ $album->year }})</li>
            @endforeach
        </ul>
    </div>

            @endif
                            
            </div>
        </div>
    </div>
</div>
    
@endsection

