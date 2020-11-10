@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content-header')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>

    </section>

@endsection

@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua-active">
                    <div class="inner">
                        <h3>{{$orders->count()??0}}</h3>
                        <h4>Order</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="{{url('admin/order')}}" class="small-box-footer"> More.. <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange-active">
                    <div class="inner">
                        <h3>{{$orders->unique('phone1')->count()??0}}</h3>
                        <h4>Users</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="{{url('admin/order')}}" class="small-box-footer"> More.. <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green-gradient">
                    <div class="inner">
                        <h3>{{$orders->sum('total_price')??0}}</h3>
                        <h4>Profit</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <a href="{{url('admin/order')}}" class="small-box-footer">More.. <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow-gradient">
                    <div class="inner">
                        <h3>{{$orders->where('status',\App\Helper\OrderStatus::Pending)->count()??0}}</h3>
                        <h4>Pending Order</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-hourglass"></i>
                    </div>
                    <a href="{{url('admin/order/'.\App\Helper\OrderStatus::Pending)}}" class="small-box-footer">More..
                        <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red-gradient">
                    <div class="inner">
                        <h3>{{$orders->where('status',\App\Helper\OrderStatus::Delivery)->count()??0}}</h3>
                        <h4>Delivering Order</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <a href="{{url('admin/order/'.\App\Helper\OrderStatus::Delivery)}}"
                       class="small-box-footer">More..<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-lime">
                    <div class="inner">
                        <h3>{{$orders->where('status',\App\Helper\OrderStatus::Completed)->count()??0}}</h3>
                        <h4>Completed Order</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                    <a href="{{url('admin/order/'.\App\Helper\OrderStatus::Completed)}}"
                       class="small-box-footer">More..<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        {{--<div class="col-lg-4 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-purple">--}}
        {{--<div class="inner">--}}
        {{--<h3>{{$cats}}</h3>--}}

        {{--<h4> خدمات متاحه</h4>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
        {{--<i class="fa fa-sitemap"></i>--}}
        {{--</div>--}}
        {{--<a href="{{url('admin/category')}}" class="small-box-footer">المزيد <i--}}
        {{--class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="col-lg-4 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-red-gradient">--}}
        {{--<div class="inner">--}}
        {{--<h3>{{$contact}}</h3>--}}

        {{--<h4>الشكاوي</h4>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
        {{--<i class="fa fa-file-text-o"></i>--}}
        {{--</div>--}}
        {{--<a href="{{url('admin/contactus')}}" class="small-box-footer"> المزيد <i--}}
        {{--class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- ./col -->--}}
        {{--<div class="col-lg-4 col-xs-6">--}}
        {{--<!-- small box -->--}}
        {{--<div class="small-box bg-blue-active">--}}
        {{--<div class="inner">--}}
        {{--<h3>{{$balances}}</h3>--}}

        {{--<h4>ميزانيات</h4>--}}
        {{--</div>--}}
        {{--<div class="icon">--}}
        {{--<i class="fa fa-balance-scale"></i>--}}
        {{--</div>--}}
        {{--<a href="{{url('admin/balance')}}" class="small-box-footer"> المزيد <i--}}
        {{--class="fa fa-arrow-circle-right"></i></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->
@endsection
