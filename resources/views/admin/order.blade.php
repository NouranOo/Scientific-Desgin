@extends('admin.layouts.master')
@section('title')
    Orders
@endsection
@section('page-header')
    <section class="content-header">
        <h1>
            Orders
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
                <div class="box" id="filterBox">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Filter <i class="fa fa-filter"></i></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="">
                        <form
                            action="{{url('admin/filter/orders')}}"
                            id="postFilter" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Status') }}</label>
                                        <select class="form-control" name="status">
                                            <option value="">Select Status..</option>
                                            @foreach(\App\Helper\OrderStatus::arr as $key=>$value)
                                                <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Gov') }}</label>
                                        <select class="form-control" name="gov">
                                            <option value="">Select Government..</option>
                                            @foreach($govs as $gov)
                                                <option value="{{$gov->id}}">{{$gov->name_en}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Date') }}</label>
                                        <input class="form-control" type="date" name="date" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">{{ __('Price') }}</label>
                                        <input class="form-control" type="number" name="price" placeholder="Price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Shipping') }}</label>
                                        <select class="form-control" name="shipping_id">
                                            <option value="">Select Shipping..</option>
                                            @foreach($shipings as $shipping)
                                                <option value="{{$shipping->id}}">{{$shipping->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">{{ __('Shipping Date') }}</label>
                                        <input class="form-control" type="date" name="shipping_date" placeholder="Shipping Date">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{--<label for="name">{{ __('Filter') }}</label>--}}
                                        <input class="form-control btn btn-primary" id="searchBtn" type="submit"
                                               value="Search">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-solid box-primary">
                    <div class="box-header">
                        <h3 class="box-title">
                            Orders </h3>
                        <div class="box-tools">
                            <a class="btn btn-info btn-edit" onclick="getOrders()" data-toggle="modal"
                               data-target="#change" title="check-orders"
                               href="{{url('admin/orders/edit')}}"><i
                                    class="fa fa-edit"></i> Edit Orders</a>
                            <a class="btn btn-warning" title="Pending"
                               href="{{url('admin/order/'.\App\Helper\OrderStatus::Pending)}}"><i
                                    class="fa fa-hourglass"></i> Pending Order</a>
                            <a class="btn btn-danger" title="Delivering"
                               href="{{url('admin/order/'.\App\Helper\OrderStatus::Delivery)}}"><i class="fa fa-truck">
                                    Delivering Order</i></a>
                            <a class="btn btn-success" title="Completed"
                               href="{{url('admin/order/'.\App\Helper\OrderStatus::Completed)}}"><i
                                    class="fa fa-thumbs-up"></i> Completed Order</a>

                        </div>
                    </div>
                    {{--model for change--}}
                    <div class="modal modal-info fade bd-example-modal-lg" id="change"
                         tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form action="{{url('admin/orders/edit')}}" method="post">
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
                                                <label for="message-text"
                                                       class="col-form-label">Status</label>
                                                <select onchange="testValue()" id="testTest" required name="status"
                                                        class="form-control">
                                                    @foreach(\App\Helper\OrderStatus::arr as $key=>$value)
                                                        <option
                                                            value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <input type="hidden" id="selectedOrder" name="order_id[]">
                                            <div class="form-group col-md-4" id="show_ship">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {{--end modal--}}

                {{--model for edit--}}

                {{--end modal--}}
                <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table class="table table-striped table-bordered table-hover myTable">
                            <thead>
                            <tr>
                                <th>All<input type="checkbox" class="check_all" onclick="check_all()"></th>
                                <th>#</th>
                                <th>Date</th>
                                <th>User Name</th>
                                <th>Phone</th>
                                <th>Phone2</th>
                                <th>City</th>
                                <th>Government</th>
                                <th>Address</th>
                                <th>Order</th>
                                <th>Chemist Ruler</th>
                                <th>Biology Ruler</th>
                                <th>Total Price</th>
                                <th>Shipping</th>
                                <th>Status</th>
                                <th>Shipment Date</th>
                                <th>Delivery Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td><input type="checkbox" id="checkedOrder" value="{{$item->id}}"
                                               class="item_checkbox" name="order_id[]"></td>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->phone1}}</td>
                                    <td>{{$item->phone2}}</td>
                                    <td>{{$item->city->name_ar}}</td>
                                    <td>{{$item->city->gov->name_ar}}</td>
                                    <td>{{$item->address}}</td>
                                    <td>
    {{$item->products->where('product_id',1)->first()->qty??0}} {{\App\Models\Product::find(1)->name}}--{{$item->products->where('product_id',2)->first()->qty??0}} {{\App\Models\Product::find(2)->name}}
                                    </td>
                                    <td>
                                        {{$item->products->where('product_id',1)->first()->qty??0}}
                                    </td>
                                    <td>{{$item->products->where('product_id',2)->first()->qty??0}}</td>
                                    <td>{{$item->total_price}}</td>
                                    <td>{{$item->shiping->name??''}}</td>
                                    <td>
                                        <span class="label
@if($item->status==\App\Helper\OrderStatus::Pending) label-warning @elseif($item->status==\App\Helper\OrderStatus::Delivery) label-danger @else label-success @endif">{{\App\Helper\OrderStatus::getStatus($item->status)}}
                                        </span>
                                    </td>
                                    <td>{{$item->shipment_date}}</td>
                                    <td>{{$item->delivery_date}}</td>

                                    <td>
                                        <a class="btn btn-xs btn-info" data-toggle="modal"
                                           data-target="#edit{{$item->id}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-xs btn-danger" href="{{url('admin/delete/order/'.$item->id)}}"
                                           onclick="return confirm('Are You Sure You Want To Delete This Order? ');"><i
                                                class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
{{--                                {{Model Edit}}--}}
                                <div class="modal modal-info fade bd-example-modal-lg" id="edit{{$item->id}}"
                                     tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <form action="{{url('admin/edit/order/'.$item->id)}}" method="post">
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
                                                            <label for="recipient-name"
                                                                   class="col-form-label">Name</label>
                                                            <input required type="text" name="name"
                                                                   value="{{$item->name}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="recipient-name"
                                                                   class="col-form-label">Email</label>
                                                            <input type="email" name="email"
                                                                   value="{{$item->email}}"
                                                                   class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="message-text"
                                                                   class="col-form-label">Phone1</label>
                                                            <input required type="number" name="phone1"
                                                                   value="{{$item->phone1}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="message-text"
                                                                   class="col-form-label">Phone2</label>
                                                            <input type="number" name="phone2"
                                                                   value="{{$item->phone2}}" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="message-text"
                                                                   class="col-form-label">City</label>
                                                            <select required name="city_id" class="form-control">
                                                                @foreach($cities as $city)
                                                                    <option
                                                                        value="{{$city->id}}" {{$city->id==$item->city_id?'selected':''}}>{{$city->name_en}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="message-text"
                                                                   class="col-form-label">Address</label>
                                                            <input required type="text" name="address"
                                                                   value="{{$item->address}}" class="form-control">
                                                        </div>
                                                        @foreach($pros as $pro)
                                                            <div class="form-group col-md-4">
                                                                <label for="message-text"
                                                                       class="col-form-label">{{$pro->name}}</label>
                                                                <input type="hidden" name="product_id[]"
                                                                       value="{{$pro->id}}">
                                                                <input required type="number" name="qty[]"
                                                                       value="{{@$item->products->where('product_id',$pro->id)->first()->qty??0}}"
                                                                       class="form-control">
                                                            </div>
                                                        @endforeach
                                                        <div class="form-group col-md-4">
                                                            <label for="message-text"
                                                                   class="col-form-label">Status</label>
                                                            <select id="selectedStatus{{$item->id}}" onchange="checkStatus2('{{$item->id}}','{{$item->status}}')" required name="status"
                                                                    class="form-control">
                                                                @foreach(\App\Helper\OrderStatus::arr as $key=>$value)
                                                                    <option
                                                                      {{$key==$item->status?'selected':''}}  value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4" id="testShip{{$item->id}}">
                                                        @if($item->ship_id)
                                                                <label for="message-text"
                                                                       class="col-form-label">Shipping</label>
                                                                <select name="shiping_id" class="form-control">
                                                                    @foreach($shipings as $ship)
                                                                        <option
                                                                          {{@$item->ship_id==$ship->id?'selected':''}}  value="{{$ship->id}}" >{{$ship->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                        @endif
                                                        </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="message-text"
                                                                       class="col-form-label">Note</label>
                                                                <textarea type="text" name="note" class="form-control">
                                                    {{$item->note}}
                                                </textarea>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
<script src="{{asset('public/assets/front/js/jquery-3.4.1.min.js')}}"></script>
<script>
    // $(document).ready(function(){
    //     $('#testSelect').onchange( function(e) {
    //         e.preventDefault();
    //         console.log("ss");
    //         if ( $(this).val() == 'Delivery')
    //             //.....................^.......
    //         {
    //
    //             $("#show_ship").show();
    //         }
    //         else
    //         {
    //             $("#show_ship").hide();
    //         }
    //     });
    // });
    // function validate()
    // {
    //     var ddl = document.getElementById("deliverySelect");
    //     var selectedValue = ddl.options[ddl.selectedIndex].value;
    //     if (selectedValue == "Delivery")
    //     {
    //         document.getElementById("show_ship").style.visibility="visible";            }
    // }
</script>
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
                dom: 'lBfrtip',
                buttons: [
                    {extend: 'print', text: 'Print'},
                    {extend: 'copy', text: 'Copy'},
                    {extend: 'excel', text: 'Excel'},
                ],
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });

        function testValue() {
            var status = $('#testTest').val();
            if (status == '{{\App\Helper\OrderStatus::Delivery}}') {
                $('#show_ship').html(`
                <label for="message-text"
                                                       class="col-form-label">Shipping</label>
                                                <select required name="shiping_id" class="form-control">
                                                    @foreach($shipings as $ship)
                    <option
                        value="{{$ship->id}}" >{{$ship->name}}</option>
                                                    @endforeach
                    </select>`)
            } else {
                $('#show_ship').empty();
            }
        }

        function checkStatus2(id) {
           var status=$('#selectedStatus'+id).val();
            if (status == '{{\App\Helper\OrderStatus:: Delivery}}') {
                console.log(status);
                $('#testShip'+id).empty();
                $('#testShip'+id).html(`
                <label for="message-text"
                                                       class="col-form-label">Shipping</label>
                                                <select required name="shiping_id" class="form-control">
                                                    @foreach($shipings as $ship)
                    <option
                        value="{{$ship->id}}" >{{$ship->name}}</option>
                                                    @endforeach
                    </select>`)
            } else {
                $('#testShip'+id).empty();
            }
        }

        function getOrders() {
            var checkedOrder = [];
            $('#checkedOrder:checked').each(function () {
                checkedOrder.push($(this).val());
            })
            checkedOrder.join(", ")
            $('#selectedOrder').val(checkedOrder);
        }
        function check_all(){
            $('input[class="item_checkbox"]:checkbox').each(function(){
                if($('input[class="check_all"]:checkbox:checked').length==0){
                    $(this).prop('checked',false);
                }else{
                    $(this).prop('checked',true);
                }
            });
        }

    </script>

@endsection
