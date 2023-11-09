@extends('admin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
        <div class="card">
                @if (session('msg'))
                    <div class="alert alert-{{session('style')}}">
                    {{ session('msg') }}
                    </div>
                @endif

        </div>
         <!-- Tabs -->
         <div class="row">
            <div class="col-xl-12">
                <h6 class="text-muted">Basic</h6>
                <div class="nav-align-top mb-4">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-top-home"
                        aria-controls="navs-top-home"
                        aria-selected="true"
                      >
                        Tổng danh sách đơn mới
                      </button>
                    </li>
                    <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-top-profile"
                        aria-controls="navs-top-profile"
                        aria-selected="false"
                      >
                        Đặt lịch
                      </button>
                    </li>
                    <li class="nav-item">
                      <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-top-messages"
                        aria-controls="navs-top-messages"
                        aria-selected="false"
                      >
                        Đặt hàng
                      </button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã đơn hàng</th>
                                    <th>Người nhận</th>
                                    <th>Thời gian đặt</th>

                                    <th>Loại đơn hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @if (!empty($book_new))
                                        @foreach ($book_new as $key=>$value )
                                        <tr>
                                            <td>{{ $value->book_id }}</td>
                                            <td>{{ $value->book_code }}</td>
                                            <td></td>
                                            <td>{{ date('l d/m/Y',strtotime($value->book_date)).' - '. date('H:i',strtotime($value->book_time_start)) }}</td>
                                            <td>Đặt lịch</td>
                                            <td>{{ number_format($value->book_total) }} <sup>đ</sup> </td>
                                            @switch($value->book_status)
                                                @case(1)
                                                    <td><span class="badge bg-label-warning">Đang đợi xác nhận</span></td>
                                                    @break
                                                @case(2)
                                                    <td><span class="badge bg-label-primary">Đã xác nhận </span></td>
                                                    @break
                                                @case(3)
                                                    <td><span class="badge bg-label-danger">Đã hủy</span></td>
                                                    @break
                                                @default
                                                    <td><span class="badge bg-label-success">Hoàn thành</span></td>
                                            @endswitch
                                            <td><a href="{{ route('admin.account-book',$value->book_code) }}" class="btn btn-default">Xem chi tiết</a></td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr><td>Bạn chưa có đơn đặt lịch nào!</td></tr>

                                    @endif
                                    @if (!empty($order_new))
                                    @foreach ($order_new as $key=>$value )
                                    <tr>
                                        <td>{{ $value->order_id }}</td>
                                        <td>{{ $value->order_code }}</td>
                                        <td></td>
                                        <td>{{ $value->created_at }}</td>

                                        <td>Đặt hàng</td>
                                        <td>{{ number_format($value->order_total) }}<sup>đ</sup></td>

                                        @switch($value->order_status)
                                            @case(1)
                                                <td><span class=" badge bg-label-warning">Đang đợi xác nhận</span></td>
                                                @break
                                            @case(2)
                                                <td><span class="badge bg-label-primary">Đã xác nhận </span></td>
                                                @break
                                            @case(3)
                                                <td><span class="badge bg-label-danger">Đã hủy</span></td>
                                                @break
                                            @default
                                                <td><span class="badge bg-label-success">Hoàn thành</span></td>
                                        @endswitch


                                        <td><a href="{{ route('admin.account-order.show',$value->order_code) }}" class="btn btn-default">Xem chi tiết</a></td>
                                    </tr>
                                    @endforeach

                                @else
                                    <tr><td>Bạn chưa có đơn hàng nào!</td></tr>
                                @endif
                            </tbody>
                                </tbody>

                            </table>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Người đăt</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Thời gian làm việc</th>
                                        <th>Tổng hóa đơn</th>
                                        <th>Trạng thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($book))
                                        @foreach ($book as $key=>$value )
                                        <tr>
                                            <td>{{ $value->book_id }}</td>
                                            <td>{{ $value->book_id }}</td>
                                            <td>{{ $value->book_address }}</td>
                                            <td>{{ date('l d/m/Y',strtotime($value->book_date)).' - '. date('H:i',strtotime($value->book_time_start)) }}</td>
                                            <td>{{ date('H:i',strtotime($value->book_time_start)) .'-'. date('H:i',strtotime($value->book_time_end)) }}</td>
                                            <td>{{ number_format($value->book_total) }} <sup>đ</sup> </td>
                                            @switch($value->book_status)
                                                @case(1)
                                                    <td><span class="badge bg-label-warning">Đang đợi xác nhận</span></td>
                                                    @break
                                                @case(2)
                                                    <td><span class="badge bg-label-primary">Đã xác nhận </span></td>
                                                    @break
                                                @case(3)
                                                    <td><span class="badge bg-label-danger">Đã hủy</span></td>
                                                    @break
                                                @default
                                                    <td><span class="badge bg-label-success">Hoàn thành</span></td>
                                            @endswitch
                                            <td><a href="{{ route('admin.account-book',$value->book_code) }}" class="btn btn-default">Xem chi tiết</a></td>
                                        </tr>
                                        @endforeach
                                        @else
                                            <tr><td>Bạn chưa có đơn đặt lịch nào!</td></tr>

                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Người nhận</th>
                                    <th>Tổng hóa đơn</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($order))
                                    @foreach ($order as $key=>$value )
                                    <tr>
                                        <td>{{ $value->order_id }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>{{ $value->order_id }}</td>
                                        <td>{{ number_format($value->order_total) }}<sup>đ</sup></td>

                                        @switch($value->order_status)
                                            @case(1)
                                                <td><span class=" badge bg-label-warning">Đang đợi xác nhận</span></td>
                                                @break
                                            @case(2)
                                                <td><span class="badge bg-label-primary">Đã xác nhận </span></td>
                                                @break
                                            @case(3)
                                                <td><span class="badge bg-label-danger">Đã hủy</span></td>
                                                @break
                                            @default
                                                <td><span class="badge bg-label-success">Hoàn thành</span></td>
                                        @endswitch


                                        <td><a href="{{ route('admin.account-order.show',$value->order_code) }}" class="btn btn-default">Xem chi tiết</a></td>
                                    </tr>
                                    @endforeach

                                @else
                                    <tr><td>Bạn chưa có đơn hàng nào!</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
         </div>
         <!-- Tabs -->

    </div>
@endsection
