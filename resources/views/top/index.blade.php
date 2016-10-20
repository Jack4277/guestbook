@extends('layouts.layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h4>TOP BOOKS</h4>
        <nav>
            <a href="{{ url('/top/books/'.$period) }}" class="btn btn-default @if($_SERVER['REQUEST_URI'] == '/top/books/'.$period) {{ 'active' }} @endif">TOP Books</a>
            <a href="{{ url('/top/authors/'.$period) }}" class="btn btn-default @if($_SERVER['REQUEST_URI'] == '/top/authors/'.$period) {{ 'active' }} @endif">TOP Authors</a>
        </nav>
        <br>
        <div class="btn-group" role="group" aria-label="...">
            <a href="{{ url('/top/'.$top.'/week') }}" class="btn btn-default @if($_SERVER['REQUEST_URI'] == '/top/'.$top.'/week') {{ 'active' }} @endif" >Week</a>
            <a href="{{ url('/top/'.$top.'/month') }}" class="btn btn-default @if($_SERVER['REQUEST_URI'] == '/top/'.$top.'/month') {{ 'active' }} @endif">Month</a>
            <a href="{{ url('/top/'.$top.'/year') }}" class="btn btn-default @if($_SERVER['REQUEST_URI'] == '/top/'.$top.'/year') {{ 'active' }} @endif">Year</a>
        </div>
        <br>
        <br>

        @if(is_array($result))
            <ol>
                @foreach($result as $r)
                    <li>{{ $r->name }}</li>
                @endforeach
            </ol>
        @endif
    </div>


</div>
@endsection