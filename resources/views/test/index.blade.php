@extends('layouts.master')
    @section('title')
        <title>Laravel Test Page</title>
    @endsection
    @section('content')
        <h1>Laravel Test Page</h1>
        <p>Zke has total yards of: {{ $total }}</p>
        @if(count($sports) > 0)
            @foreach($sports as $sport)
                {{ $sport }} <br>
            @endforeach
        @else
            <h1> Sorry, nothing to show...</h1>
        @endif
    @endsection