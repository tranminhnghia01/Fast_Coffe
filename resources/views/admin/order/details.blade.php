@extends('admin.layouts.app')
@section('content')
@php
    $total = 0;
@endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Đơn hàng /</span> Chi tiết
    </h4>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card overflow-hidden mb-4" >
                <h5 class="card-header">Thông tin Người đặt</h5>
                <div class="card-body" >
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-name">Họ tên  :</label>
                                    <div class="col-sm-8">
                                        <input disabled style="background:none;border: none;" type="text" class="form-control" id="basic-default-name" placeholder="John Doe" value="{{ $shipping->shipping_name }}"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-email">Email  :</label>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                        <input disabled style="background:none;border: none;" class="form-control" value="{{ $shipping->shipping_email }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-phone">Số điện thoại  :</label>
                                    <div class="col-sm-8">
                                        <input disabled style="background:none;border: none;" class="form-control phone-mask" value="{{ $shipping->shipping_phone }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-message">Ghi chú  :</label>
                                    <div class="col-sm-8">
                                        <input disabled style="background:none;border: none;" class="form-control phone-mask" value="{{ $shipping->shipping_notes }}"/>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label" for="basic-default-message">Địa chỉ nhận hàng  :</label>
                                    <div class="col-sm-8">
                                        <input disabled style="background:none;border: none;"
                                        class="form-control phone-mask"value="{{ $order->order_address }}"/>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Horizontal Scrollbar -->
        <div class="col-md-6 col-sm-12">
            <div class="card overflow-hidden" >
                <h5 class="card-header">Đơn hàng</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table"style="text-align: center">
                            <thead>
                                <tr >
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($orderDetails as $key=>$value)
                                    @php
                                        $subtotal = $value->product_price*$value->product_sales_qty;
                                        $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $value->product_name }}</strong></td>
                                        <td>{{ number_format($value->product_price,0,',','.') .' x '. $value->product_sales_qty  }}</td>
                                        <td>{{ number_format($subtotal,0,',','.') }} <sup>đ</sup> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-borderless">
                            <tbody>
                                <td colspan="2" style="text-align: center"><h1>Hóa đơn thanh toán</h1></td>
                                <tr>
                                    <td><p class="" style="font-size: 18px">Tổng tiền hàng</p></td>
                                    <td class="py-3">
                                      <p class="mb-0">{{ number_format($total,0,',','.') }} <sup>đ</sup></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="" style="font-size: 18px">Khuyến mãi</p></td>
                                    <td class="py-3">
                                        <p class="mb-0">
                                        @if ($coupon == true)
                                            @if ($coupon->coupon_method == 0)
                                            {{ number_format($total* $coupon->coupon_number/100,0,',','.') }} <sup>đ</sup>
                                            @else
                                            {{ number_format($total- $coupon->coupon_number,0,',','.') }} <sup>đ</sup>
                                            @endif
                                        @else
                                            0
                                        @endif
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td><p class="" style="font-size: 18px">Hình thức thanh toán</p></td>
                                    <td class="py-3">
                                        <p class="mb-0"> <small>({{$payment->payment_method}})</small> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><p class="" style="font-size: 18px">Tổng thanh toán</p></td>
                                    <td class="py-3">
                                        <p class="mb-0">{{ number_format($order->order_total,0,',','.') }} <sup>đ</sup></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
