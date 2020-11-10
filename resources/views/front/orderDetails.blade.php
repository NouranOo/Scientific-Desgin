<div class="box box-solid box-info">
    <div class="box-header">
        <h3 class="box-title">{{$order->status==\App\Helper\OrderStatus::Pending?'يوجد بالفعل طلب موجود هل تريد تعديله؟':'يوجد طلب بالفعل في مرحله الشحن هل تريدعمل طلب جديد؟'}}</h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span>الاسم:</span><span
                            class="btn-xs label-info">{{$order->name}}</span><br>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span>المحافظه: </span><span>{{$order->city->gov->name_ar}}</span><br>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span>الموبيل: </span><span>{{$order->phone1}}</span><br>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span> التاريخ: </span><span>{{$order->created_at}}</span>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span
                        >الطلب: </span><span>مسطره كيمياء{{$order->products->where('product_id',1)->first()->qty??0}}
                            --مسطره احياء {{$order->products->where('product_id',2)->first()->qty??0}}</span><br>
                    </h5>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5>
                        <span
                        >الاجمالي: </span><span>{{$order->total_price}}</span><br>
                    </h5>
                </div>
            </div>

        </div>
    </div>
</div>
