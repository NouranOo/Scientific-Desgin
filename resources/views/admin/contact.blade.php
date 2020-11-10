@extends('admin.layouts.master')

@section('title')
    عرض الشكاوي
@endsection

@section('page-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            عرض الشكاوي
        </h1>
    </section>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                            عرض الشكاوي </h3>
                        <div class="box-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>الشكوي </th>
                                <th>الاجراءات </th>
                            </tr>
                            <tbody>
                            @foreach($contact as $con)
                                <tr>
                                    <td>{{$con->name}}</td>
                                    <td>{{$con->email}}</td>
                                    <td>{{substr($con->message,0,250)}}</td>
                                    <td><a class="btn btn-info" data-toggle="modal" title="عرض"
                                           data-target="#view{{$con->id}}"><i class="fa fa-eye"></i></a></td>

                                </tr>
                                {{--model for date--}}
                                <div class="modal modal-primary fade bd-example-modal-lg" id="view{{$con->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">عرض الشكوي</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">الاسم</label>
                                                        <input disabled type="text" value="{{$con->name}}" class="form-control" id="recipient-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">البريد الالكتروني</label>
                                                        <input disabled type="email" class="form-control" value="{{$con->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">الشكوي</label>
                                                        <textarea disabled rows="10" class="form-control">{!! $con->message !!}</textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--end modal--}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
