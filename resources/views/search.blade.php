@extends('layouts.app')

@section('content')

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Username</th>
                <th>Followers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <img width="50px" src="{{ $user->avatar_url }}" alt="">
                    </td>
                    <td style="line-height: 50px;">{{ $user->login }}</td>
                    <td style="line-height: 50px;">
                        <a href="/users/{{ $user->login }}">followers</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@stop
