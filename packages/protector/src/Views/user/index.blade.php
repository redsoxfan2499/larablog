@extends('layouts.app')

@section('title')

    <title>Users</title>

@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content"><!-- section content -->
            <div class="row"><!-- start row -->
                <!-- column -->
                <div class="col-md-6">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Users Table</h3>
                            @if ($users->isEmpty())
                                <p> There are no users.</p>
                            @else
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{!! $user->id !!}</td>
                                        <td>{!! $user->name !!} </td>
                                        <td>{!! $user->email !!}</td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo LARAVEL_URL; ?>/admin/users/{!! $user->id !!}/edit">Edit</a>
                                        </td>
                                        <td>
                                            <form class="delete" method="post" action="<?php echo LARAVEL_URL; ?>/admin/users/{!! $user->id !!}/delete" >
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div><!--/.col -->
            </div><!-- end row -->
        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection
