@extends('layouts.app')

@section('title')

    <title>Create a User</title>

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
                            <h3 class="box-title">Create User</h3>
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
                                    <label for="user_name">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name">
                                </div>
                                <div class="form-group">
                                    <label for="user_email">User Email</label>
                                    <input type="email" class="form-control" id="user_email" name="user_email">
                                </div>
                                <div class="form-group">
                                    <label for="user_password">User Password</label>
                                    <input type="password" class="form-control" id="user_password" name="user_password">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col -->
            </div><!-- end row -->
        </section>
    </div>
    <!-- /.content-wrapper -->



@endsection
