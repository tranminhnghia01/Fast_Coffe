@extends('frontend.user.dashboard')
@section('profile')
<div class="dashboard-wrapper user-dashboard">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên</th>
                    <th>Người nhận</th>
                    <th>Trọng lượng(Kg)</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($order_details))
                    @foreach ($order_details as $key=>$value )
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $value->product_id }}</td>
                        <td>{{ $value->product_name }}</td>
                        <td>{{ $value->product_price }}</td>
                        <td>{{ $value->product_sales_qty }} (Kg)</td>
                        <td><span class="label label-warning">Đang đợi xác nhận</span></td>
                    </tr>
                    @endforeach
                    <td><a href="" class="btn btn-default">Thay đổi</a></td>
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
