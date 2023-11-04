@extends('admin.layouts.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>
        <div class="card">
            <h5 class="card-header">Table Basic</h5>
              @if (session('msg'))
            <div class="alert alert-{{session('style')}}">
            {{ session('msg') }}
            </div>
         @endif
            <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>avatar</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($AllUser as $item => $value)
                    <tr>
                        <td>{{  $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top">
                                    <img src="{{ asset('uploads/users/'.$value->avatar) }}" alt="Avatar" class="rounded-circle" style="width: 50px;"/>
                                </li>
                            </ul>
                        </td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->address }}</td>
                        @if ($value->level == 0)
                            <td><span class="badge bg-label-success me-1">Quản trị viên</span></td>
                        @elseif ($value->level == 1)
                            <td><span class="badge bg-label-info me-1">Người giúp việc</span></td>
                        @else
                            <td><span class="badge bg-label-warning me-1">Khách hàng</span></td>
                        @endif
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">


                                <a class="dropdown-item"@if ($value->id == Auth::user()->id)
                                    href="{{ route('admin.account') }}"
                                    @else
                                    href="{{ route('admin.account-users.edit',$value->id) }}"
                                    @endif
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a>

                                    @if ($value->id != Auth::user()->id)

                                    <form action="{{ route('admin.account-users.destroy',$value->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>Delete</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            <div class="col-lg-12">
                <div class="demo-inline-spacing">
                  <nav aria-label="Page navigation">
                    <ul class="pagination  justify-content-end">

                    </ul>
                  </nav>
                </div>
            </div>
            <a href="{{ route('admin.account-users.create') }}" type="button" class="btn btn-success m-2">Thêm tài khoản</a>
            </div>
        </div>

    </div>
@endsection
