@extends('layouts.master')
@section('title', 'Update Profile')
@section('content')
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Cập nhập thông tin</h4>
                <form action="{{ route('profiles.updateProfile', $user->id) }}" class="form-sample" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Họ tên <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control"
                                        value="{{ $user->address }}" />
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ngày sinh <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="birthday" class="form-control"
                                        value="{{ $user->birthday }}" />
                                    @error('birthday')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label>File upload</label><br>
                            <input type="file" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cập nhập</button>
                    <button type="button" onclick="window.location.href='{{ route('profile') }}'"
                        class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
