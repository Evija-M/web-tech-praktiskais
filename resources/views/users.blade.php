@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @if ($users->count() == 0)
                <div class="bd-example">{{ __('messages.There are no users yet') }}</div>

                @else 
                <div class="bd-example" style="margin-left: 40px">

        <table class="table table-striped">
            <thead>
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Name</th>
              <th scope="col">Last name</th>
              <th scope="col">E-mail</th>
              <th scope="col">Role</th>
            </tr>
            </thead>
            <tbody>
            
                @foreach ( $users as $user )
                <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td> {{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                </tr> 
                @endforeach
              
            </tbody>
          </table>


</div>
            @endif

            </div>
        </div>
    </div>
</div>
    
@endsection

{{-- <a href="{{url('users', $user)}}" > </a> --}}