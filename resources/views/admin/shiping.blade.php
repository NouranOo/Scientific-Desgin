@extends('admin.layouts.master')
@section('title')
    Shipping
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Shipping
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
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Shipping </h3>
                        <div class="box-tools">
                            <a class="btn bg-black-gradient" title="Add" data-toggle="modal"
                               data-target="#add"><i class="fa fa-plus"></i></a>

                            {{--model for add--}}
                            <div class="modal modal-info fade bd-example-modal-lg" id="add" tabindex="-1" role="dialog"
                                 aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <form action="{{url('admin/create/shiping')}}" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Name
                                                            </label>
                                                        <input type="text" required name="name" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="recipient-name" class="col-form-label">Active
                                                            </label>
                                                        <select name="active" class="form-control" >
                                                            <option value="1">Active</option>
                                                            <option value="0">Not Active</option>

                                                        </select>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Add</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--end modal--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover myTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shipings as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{\App\Helper\ShippingStatus::getStatus($item->active)}}</td>
                                    <td>
                                        <a class="btn btn-xs btn-info" data-toggle="modal"
                                           data-target="#edit{{$item->id}}"><i class="fa fa-edit"></i></a>

                                        <a class="btn btn-xs btn-danger" href="{{url('admin/delete/shiping/'.$item->id)}}"
                                           onclick="return confirm('Are You Sure You Want To Delete This Shipping? ');"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>

                                </tr>
                                {{--model for edit--}}
                                <div class="modal modal-info fade bd-example-modal-lg" id="edit{{$item->id}}"
                                     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{url('admin/edit/shiping/'.$item->id)}}" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="recipient-name" class="col-form-label">Name
                                                                </label>
                                                            <input type="text" name="name" value="{{$item->name}}"
                                                                   class="form-control" id="recipient-name">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="recipient-name" class="col-form-label">Active
                                                                </label>
                                                            <select name="active" class="form-control" >
                                                                <option value="0" @if($item->active == 0)
                                                                            selected
                                                                        @endif >
                                                                        Not Active
                                                                </option>
                                                                <option value="1" @if($item->active == 1)
                                                                selected
                                                                    @endif >
                                                                     Active
                                                                </option>

                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                {{--end modal--}}
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                {{--{{ $govs->links() }}--}}
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
@endsection
@section('js')
    <script src="{{ asset('public/assets/admin/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script>
        $(document).ready(function () {
            $('.myTable').DataTable({
                dom: 'lfrtip',
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });
    </script>
@endsection
