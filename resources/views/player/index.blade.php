@extends('layouts.master')

@section('title')

    <title>Players</title>

    @endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li class='active'>Players</li>
    </ol>

    <h2>Players</h2>

    <hr/>
    @if( Session::has('success') )
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('success') }}
        </div>
    @endif
    @if($players->count() > 0)

        <table class="table table-hover table-bordered table-striped">

         <thead>
         <th>Id</th>
         <th>Name</th>
         <th>Position</th>
         <th>Team</th>
         <th>Date Created</th>
         </thead>

            <tbody>

            @foreach($players as $player)

                <tr>
                    <td>{{ $player->id }}</td>
                    <td><a href="/player/{{ $player->id }}">{{ $player->name }}</a></td>
                    <td>{{ $player->position }}</td>
                    <td>{{ $player->team }}</td>
                    <td>{{ $player->created_at }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    @else

    Sorry, no Players

    @endif

    {{ $players->links() }}
    <div>
        <a href="/player/create">
            <button type="button" class="btn btn-lg btn-primary">Create New</button>
        </a>
    </div>
    @endsection