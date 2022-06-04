@extends('layouts.master')
@section('title', 'Update Profile')
@section('content')
    <form action="{{ route('profiles.updateProfile', $user->id) }}" class="form-sample" method="post" enctype="multipart/form-data">
    <div class="col-12 grid-margin mb-5 pb-5">
        <!-- User info -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thông tin cá nhân</h4>
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

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">File upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image">
                                    @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- End user info -->

        <!-- Education -->
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="card-title">Học vấn</h4>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Hệ đào tạo <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="ts" class="form-control" value="{{ $user->education->ts }}" />
                                @error('ts')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nơi đào tạo</label>
                            <div class="col-sm-9">
                                <input type="text" name="tp" class="form-control"
                                       value="{{ $user->education->tp }}" />
                                @error('tp')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ngành học <span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="disciplines" class="form-control"
                                       value="{{ $user->education->disciplines }}" />
                                @error('disciplines')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Năm tốt nghiệp</label>
                            <div class="col-sm-9">
                                <input type="text" name="gy" class="form-control" value="{{ $user->education->gy }}" />
                                @error('gy')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End education -->


        <div class="btn-form-update mt-3">
            <button type="submit" class="btn btn-primary mr-2">Cập nhập</button>
            <a type="button" href='{{ route('profile') }}' class="btn btn-light">Cancel</a>
        </div>
    </div>

    </form>
@endsection
