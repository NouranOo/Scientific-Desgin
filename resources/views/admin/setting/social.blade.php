@extends('admin.layouts.master')
@section('title')
    Social Links
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Social Links
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
                            Social Links </h3>
                        <div class="box-tools">
                            {{--<a class="btn btn-primary" title="Add" data-toggle="modal"--}}
                            {{--data-target="#add"><i class="fa fa-plus"></i></a>--}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <form action="{{url('admin/edit/setting/')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="recipient-name" class="col-form-label">Facebook</label>
                                    <input type="url" name="facebook" value="{{$setting->facebook}}"
                                           class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="recipient-name" class="col-form-label">Twitter</label>
                                    <input type="url" name="twitter" value="{{$setting->twitter}}" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="message-text"
                                           class="col-form-label">Youtube</label>
                                    <input type="url" name="youtube" value="{{$setting->youtube}}" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="message-text"
                                           class="col-form-label">Instagram</label>
                                    <input type="url" name="instagram" value="{{$setting->instagram}}" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="message-text"
                                           class="col-form-label">Phone/WhatsApp</label>
                                    <input type="number" name="phone" value="{{$setting->phone}}" class="form-control">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
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
