@extends('layouts.app')

@section('title')

    <title>Edit Role</title>

@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content"><!-- section content -->
            <div class="row"><!-- start row -->
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit a Role</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST" action="">
                            <!-- error messages -->
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger">{{ $error }}</p>
                            @endforeach
                        <!-- status messages -->
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="role_name">Role Name</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name" value="{!! $role->name !!}">
                                </div>
                                <div class="form-group">
                                    <label for="role_label">Role Label</label>
                                    <input type="text" class="form-control" id="role_label" name="role_label" value="{!! $role->label !!}">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div><!-- end row -->
        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection
