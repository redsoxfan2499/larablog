@extends('layouts.app')

@section('title')

    <title>Permissions</title>

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
                            <h3 class="box-title">Permissions Table</h3>
                            @if ($permissions->isEmpty())
                                <p> There are no permissions.</p>
                            @else
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>

                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Label</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{!! $permission->id !!} </td>
                                        <td>
                                            {!! $permission->name !!}
                                        </td>
                                        <td>{!! $permission->label !!}</td>
                                        <td>
                                            <a class="btn btn-warning" href="<?php echo LARAVEL_URL; ?>/admin/permissions/{!! $permission->id !!}/edit">Edit</a>
                                        </td>
                                        <td>
                                            <form class="delete" method="post" action="<?php echo LARAVEL_URL; ?>/admin/permissions/{!! $permission->id !!}/delete" >
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

                </div><!--/.col (right) -->
            </div><!-- end row -->
        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection