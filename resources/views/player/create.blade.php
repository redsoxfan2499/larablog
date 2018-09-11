@extends('layouts.master')

@section('title')

    <title>Create a Player</title>

@endsection

@section('content')

    <ol class='breadcrumb'>
        <li><a href='/'>Home</a></li>
        <li><a href='/player'>Players</a></li>
        <li class='active'>Create</li>
    </ol>

    <h2>Create a New Player</h2>

    <hr/>

    <form class="form" role="form" method="POST" action="{{ url('/player') }}">

    {{ csrf_field() }}

    <!-- player Form Input -->

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Player Name</label>

            <input type="text" class="form-control" name="name" value="{{ old('name') }}">

             <label class="control-label">Player Position</label>

            <input type="text" class="form-control" name="position" value="{{ old('position') }}">

             <label class="control-label">Player Team</label>

            <input type="text" class="form-control" name="team" value="{{ old('team') }}">

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @elseif($errors->has('position'))
                <span class="help-block">
                    <strong>{{ $errors->first('position') }}</strong>
                </span>
            @elseif($errors->has('team'))
                <span class="help-block">
                    <strong>{{ $errors->first('team') }}</strong>
                </span>
            @endif

        </div>


        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">

                Create

            </button>

        </div>

    </form>

@endsection