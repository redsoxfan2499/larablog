@extends('layouts.app')

@section('title')

    <title>Roles Matrix</title>

@endsection

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content"><!-- section content -->
            <div class="row"><!-- start row -->
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-10 col-md-offset-1">
                    <h1>Role Matrix <small class="hidden-xs">Permissions that are on each role</small></h1>

                    <form role="form" method="POST" action="">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="table" style="max-height:500px; overflow:auto;">
                            <table class="table table-bordered table-striped table-hover" style=" margin-bottom:0">
                                <thead>
                                <tr class="alert-primary">
                                    <th class="text-center">
                                  <span class="pull-left"><span class="sr-only">Permissions</span>
                                    <i class="fa fa-arrow-down"></i>
                                    <i class="fa fa-user fa-lg"></i>
                                  </span>

                                        <span class="pull-right"><span class="sr-only">Roles</span>
                                  <i class="fa fa-users" title="Roles"></i>
                                  <i class="fa fa-arrow-right"></i>
                                  </span>
                                    </th>
                                    @foreach ($roles as $r)
                                        <th> {{ $r->name }} <a href="">
                                                <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-link"></span></button></a>
                                        </th>
                                    @endforeach
                                </tr>
                                </thead>

                                <tbody>

                                @foreach($perms as $p)
                                    <tr>
                                        <th class="alert-primary">
                                            <a href="">
                                                <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-link"></span></button></a>
                                            {{ $p->name }}
                                        </th>
                                        @for ($i=0; $i < $roles->count(); $i++ )
                                            <td data-container="body" data-trigger="focus" data-toggle="popover" data-placement="left" data-content="Role: {{$roles[$i]->name}}, Permission: {{$p->slug}}">
                                                @php
                                                    $firstArray = $roles[$i]->id.":".$p->id;
                                                    $checked = in_array( ($roles[$i]->id.":".$p->id), $pivot ) ? true : false;
                                                    if ($checked == 1)
                                                    {
                                                      $checkvalue  = 'checked';
                                                    }
                                                    else
                                                    {
                                                      $checkvalue = '';
                                                    }
                                                    echo '<input id="perm_role[]" name="perm_role[]" type="checkbox" value="'. $firstArray .'" '.$checkvalue.' ';
                                                @endphp
                                            </td>
                                        @endfor
                                    </tr>
                                @endforeach

                                <!-- table footer -->
                                <tfoot>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-danger form-control" type="submit" value="Save User Role Changes">
                        </div>
                    </form>
                </div>
            </div><!-- end row -->

        </section>
    </div>
    <!-- /.content-wrapper -->


@endsection
