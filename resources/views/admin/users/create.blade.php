@extends('admin.layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Blog</h4>

<!-- Basic Layout -->
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">Thêm tài khoản người dùng</h5>
        <small class="text-muted float-end">Default</small>
      </div>
        @if (session('msg'))
            <div class="alert alert-{{session('style')}}">
            {{ session('msg') }}
            </div>
         @endif
         <form method="post" enctype="multipart/form-data"  action="{{ route('admin.account-users.store') }}">
            @csrf
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <label for="user-avatar">
                    <img class="profile-image" src="{{ asset('admin/assets/img/avatars/1.png') }}"
                    alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                    <input type="file" id="user-avatar" class="account-file-input" name="avatar" hidden accept="image/png, image/jpeg"/>
                    </label>
                    <div class="button-wrapper">
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstname" autofocus />
                    @error('firstname')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastname" id="lastName" />
                    @error('lastname')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="john.doe@example.com" />
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="passord" class="form-label">Password</label>
                    <input class="form-control" type="password" id="passord" name="password" placeholder="password" />
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">US (+84)</span>
                        <input type="text" id="phoneNumber" name="phone" class="form-control" placeholder="202 555 0111"/>
                    </div>
                    @error('phone')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"/>
                        @error('address')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <select name="city_id" id="city" class="select2 form-select choose city">
                        <option value="">--- Chọn Thành Phố ---</option>
                        @foreach ($city as $item)
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                        @endforeach
                    </select>
                    @error('city_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="province">Province</label>
                    <select name="province_id" id="province" class="select2 form-select choose province">
                        @foreach ($province as $item)
                        @endforeach
                    </select>
                    @error('province_id')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="ward">Ward</label>
                    <select name="ward_id" id="ward" class="select2 form-select ward">
                        @foreach ($ward as $item)
                        @endforeach
                    </select>
                    @error('ward_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Add account</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection
