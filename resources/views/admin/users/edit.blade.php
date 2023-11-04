@extends('admin.layouts.app')
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li >
          <li class="nav-item">
            <a class="nav-link" href=""
              ><i class="bx bx-bell me-1"></i> Notifications</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
          </li>
        </ul>

        @if (session('msg'))
        <div class="alert alert-{{session('style')}}">
          {{ session('msg') }}
        </div>
      @endif

        <div class="card mb-4">
          <h5 class="card-header">Update account user</h5>
          <!-- Account -->
          <form method="post" enctype="multipart/form-data"  action="{{ route('admin.account-users.update',$user->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <label for="user-avatar">
                    <img class="profile-image"
                    @if($user->avatar)
                        src="{{ asset('admin/uploads/user/avatar/'.$user->avatar ) }}"
                    @else
                        src="{{ asset('admin/assets/img/avatars/1.png') }}"
                    @endif

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
                @csrf
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="firstName" name="firstname" value="{{ $first_name }}" autofocus />
                    @error('firstname')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="lastname" id="lastName" value="{{ $last_name }}" />
                    @error('lastname')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ $user->email }}" placeholder="john.doe@example.com" />
                    @error('email')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input class="form-control" type="password" id="password" name="password"  placeholder="password" />
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">US (+84)</span>
                        <input type="text" id="phoneNumber" name="phone" class="form-control" placeholder="202 555 0111"
                        @if ($user->phone)
                            value="{{ $user->phone }}"
                        @endif />
                    </div>
                    @error('phone')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                    </div>


                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">Role</label>
                        <select name="level" id="level" class="select2 form-select">
                            @foreach ($role as $item)
                                 @if($item->role_id == $user->level)
                                    <option value="{{ $item->role_id }}" selected>{{ $item->role_name }}</option>
                                @else
                                    <option value="{{ $item->role_id }}">{{ $item->role_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('city_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address"
                        @if ($user->address)
                            value="{{ $user->address }}"
                            @endif />
                        @error('address')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="country">Country</label>
                    <select name="city_id" id="city" class="select2 form-select choose city">
                        <option value="">--- Chọn Thành Phố ---</option>
                        @foreach ($city as $item)
                        @if($item->city_id == $user->city_id)
                        <option value="{{ $item->city_id }}" selected>{{ $item->city_name }}</option>
                        @else
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                        @endif
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
                        @if($item->province_id == $user->province_id)
                        <option value="{{ $item->province_id }}" selected>{{ $item->province_name }}</option>
                        @endif
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
                        @if($item->ward_id == $user->ward_id)
                        <option value="{{ $item->ward_id }}" selected>{{ $item->ward_name }}</option>
                        @endif
                        @endforeach
                    </select>
                    @error('ward_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                    </div>

                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
          </form>
          <!-- /Account -->
        </div>
        <div class="card">
          <h5 class="card-header">Delete Account</h5>
          <div class="card-body">
            <div class="mb-3 col-12 mb-0">
              <div class="alert alert-warning">
                <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" onsubmit="return false">
              <div class="form-check mb-3">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="accountActivation"
                  id="accountActivation"
                />
                <label class="form-check-label" for="accountActivation"
                  >I confirm my account deactivation</label
                >
              </div>
              <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
