@extends('layouts.app')

@section('content')


    <div class="card card-default">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </thead>


                    <tbody>
                        @foreach($users as $user)
                            @if($user->id != 4)
                                <tr>
                                    <td>
                                        <img src="{{ Gravatar::src($user->email) }}" width="40px" height="40px" style="border-radius: 50%" alt="img"/> 
                                    </td>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        @if(!$user->isAdmin())
                                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success btn-sm">Make Admin</button>
                                            </form>
                                            </td>
                                            <td>
                                            <a href="{{ route('admin.impersonate', $user->id) }}" class="btn btn-primary btn-sm ">Impersonate User</a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Users Yet.</h3>
            @endif
        </div>
    </div>

@endsection