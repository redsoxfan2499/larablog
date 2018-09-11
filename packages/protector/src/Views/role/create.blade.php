@extends('layouts.app')

@section('title')

    <title>Create a Role</title>

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
                            <h3 class="box-title">Add Permissions to a Role</h3>
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
                                    <input type="text" class="form-control" id="role_name" name="role_name" value="">
                                </div>
                                <div class="form-group">
                                    @if(is_null($permissions))
                                        <p> There are no permissions.</p>
                                    @else
                                        <br>
                                        <div class="checkbox">
                                            <label>
                                                @foreach($permissions as $permission)
                                                    <input id="permission" name="permission" value="{{ $permission->id }}" type="checkbox"> {{ $permission->name}}
                                            @endforeach
                                            @endif
                                        </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
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
