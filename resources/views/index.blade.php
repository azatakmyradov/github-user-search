@extends('layouts.app')

@section('content')
    <form action="/search" method="GET" role="form">
        <div class="form-group">
            <input type="text" class="form-control" name="query" placeholder="Search GitHub user" minlength="4">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
