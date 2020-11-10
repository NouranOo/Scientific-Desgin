@extends('front.layouts.master')
@section('title')
    الرئيسيه
@endsection

@section('content')
    <!-- start of product-informations -->
    <form action="{{url('create/order')}}" id="myForm" method="post">
        @csrf
        <div class="product-info ">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 " style="">

                        <table>
                            <thead>
                            <tr>
                                <th scope="">الصوره</th>
                                <th scope="">المنتج</th>
                                <th scope="">عدد المنتجات</th>
                                <th scope="">السعر</th>
                                <th scope="">الاجمالي</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                    <th scope=""><img src="{{url('public/assets/front/img/'.$product->image)}}" alt="">
                                    </th>
                                    <td>{{$product->name}}</td>
                                    <td><input type="number" name="qty[]" id="productQ{{$product->id}}" min="0"
                                               placeholder="العدد"></td>
                                    <td>{{$product->price}}</td>
                                    <td id="productTotal{{$product->id}}">0</td>
                                </tr>
                                <script>
                                    $('#productQ{{$product->id}}').change(function (e) {
                                        e.preventDefault();
                                        var number = $(this).val();
                                        var price = '{{$product->price}}';
                                        var total = (Math.floor(number / 10) * 225) + ((number % 10) * price);
                                        $('#productTotal{{$product->id}}').text(total);
                                        if($('#gov').children("option:selected").attr('data')){
                                        var govDelivery = $('#gov').children("option:selected").attr('data');
                                        }else{
                                            govDelivery=0;
                                        }
                                        if (number >= 10) {
                                            govDelivery = 0;
                                        }
                                        var lastprice = 0;
                                            @foreach($products as $item)
                                        var lastprice = lastprice + parseInt($('#productTotal{{$item->id}}').text());
                                            @endforeach
                                        var lastTotal = parseInt(lastprice) + parseInt(govDelivery);
                                        $('#lastPrice').text(lastprice);
                                        $('#delivery').text(govDelivery);
                                        $('#lastTotal').text(lastTotal);
                                    });
                                </script>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="notes text-right">
                            <h6>ملاحظات</h6>
                            <p> -سعر المسطرة الواحدة ٢٥جنيه بدلاً من ٣٥جنيه</p>
                            <p> -يضاف مصاريف شحن
                                ٣٠جنيه فى القاهرة والجيزة
                                ٤٠جنيه لمحافظات الدلتا
                                ٥٠ جنيه لمحافظات الصعيد
                                و في حالة طلب علبة أو أكثر لا يضاف أي مصاريف شحن</p>
                            <p> - لو جمعت صحابك وطلبت علبة (١٠ مساطر) هتبقى ٢٢٥ جنيه بدلا من٣٥٠ جنيه وهتوصلك لحد عندك
                                بدون مصاريف شحن.
                                عرض لفتره محدوده</p>

                            {{--<button disabled>إحصل علي العرض الان</button>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="student-data ">
            <div class="container">
                <div class="data text-right">
                    <h6 class="text-center">ادخل بياناتك</h6>
                    <div class="row">
                        <div class="col-12">
                            <div class="input">
                                <label for="">الاسم* : </label>
                                <input type="text" name="name" required id="">
                            </div>
                        </div>
                        {{--<div class="col-6">--}}
                            {{--<div class="input">--}}
                                {{--<label for="">الايميل : </label>--}}
                                {{--<input type="email" name="email" id="">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input">
                                <label for="">الموبيل 1* : </label>
                                <input type="number"  name="phone1" required id="phone">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input">
                                <label for="">الموبيل 2 : </label>
                                <input type="number" name="phone2"  id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input">
                                <label for="">المحافظه* : </label>
                                <div class="select">
                                    <select class="select" required id="gov">
                                        <option value="">المحافظه ..</option>
                                        @foreach($govs as $gov)
                                            <option data="{{$gov->delivery}}"
                                                    value="{{$gov->id}}">{{$gov->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input">
                                <label for="">المدينه* : </label>
                                <select class="select" id="city" required name="city_id">
                                    <option value="">المدينه ..</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="input">
                                <label for="">العنوان* : </label>
                                <input type="text" name="address" required id="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-price text-right">
                    <div class="row d-flex justify-content-around">
                        <ul class="list-unstyled">
                            <li><span>السعر الكلي : </span><span id="lastPrice">0</span></li>
                            <li><span>الشحن : </span><span id="delivery">0</span></li>
                            <li><span class="btn btn-primary" style="cursor: default"><span>الاجمالي : </span><span id="lastTotal">0</span></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="order text-center">
            <a href="">
                <button onclick="if($.inArray($('#phone').val(),{{json_encode($phones->pluck('phone1')->toArray())}}) >= 0){checkOrder(event)};" type="submit">طلب</button>
            </a>
        </div>
    </form>
    @include('front.includes.model2')
@endsection
@section('js')
    <script>
        $('#gov').change(function (e) {
            e.preventDefault();
            var country_id = $(this).val();
            var govDelivery = $(this).children("option:selected").attr('data');
            var price = 0;
            @foreach($products as $item)
            if ($('#productQ{{$item->id}}').val() >= 10) {
                govDelivery = 0;
            }
            var price = price + parseInt($('#productTotal{{$item->id}}').text());
            @endforeach
            $('#lastPrice').text(price);
            $('#delivery').text(govDelivery);
            var lastTotal = parseInt(price) + parseInt(govDelivery);
            $('#lastTotal').text(lastTotal);

            $.ajax({
                type: 'get',
                url: '{{url('city/country/')}}/' + country_id,
                success: function (res) {
                    if (res) {
                        $("#city").empty();
                        $("#city").append('<option value="">المدينه ..</option>');
                        $.each(res, function (key, value) {
                            $("#city").append('<option value="' + value.id + '">' + value.name_ar + '</option>');
                        });
                    } else {
                        $("#city").empty();
                        $("#city").append('<option value="">المدينه ..</option>');
                    }
                }
            })
        });
        function checkOrder(e) {
            e.preventDefault();
            var phone=$('#phone').val();
            var data={phone:phone,_token:$('meta[name="csrf-token"]').attr('content')};
            $.ajax({
               type:'post',
                url: '{{url('get/order/details/')}}',
                data:data,
                success:function (res) {
                    if(res){
                        $('#DetailsModal').modal('show');
                        $('#detailsDiv').html(res);
                    }
                },
                error:function (error) {
                    var errors=error.responseJSON;
                    $.each(errors,function (key,value) {
                        $.each(value,function (k,v) {
                            swal('',v[0],'error');
                        })
                    });
                },
            });

        };
        $('#submitForm').click(function () {
            $('#myForm').submit();
        })
    </script>
@endsection
