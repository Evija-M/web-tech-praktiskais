@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($genres->count() == 0)
                    <div class="bd-example">{{ __('messages.There are no genres yet') }}</div>
                @else
                <div class="bd-example">{{ __('messages.Click on genre name to view artists') }}</div>
                <div class="bd-example"><ul class="list-group">
            @foreach ( $genres as $genre )

            <li class="list-group-item"><a href="{{url('artists')}}" > 
                {{ $genre->genre_name }}
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


