@extends('layouts.master')
@section('title', 'Chỉnh sửa thông tin')
@section('content')
    <form action="{{ route('profiles.updateProfile', $user->id) }}" class="form-sample" method="post"
        enctype="multipart/form-data">
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
                                <label class="col-sm-3 col-form-label">Ảnh </label>
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
                    <h4 class="card-title">Học vấn đại học</h4>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Hệ đào tạo <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="ts" class="form-control"
                                        value="{{ $user->education->ts }}" />
                                    @error('ts')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nơi đào tạo <span
                                        class="text-danger">*</span></label>
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
                                <label class="col-sm-3 col-form-label">Năm tốt nghiệp <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="gy" class="form-control"
                                        value="{{ $user->education->gy }}" />
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
            <!-- Afteredu -->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Học vấn sau đại học</h4>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Bằng thạc sĩ chuyên ngành</label>
                                <div class="col-sm-9">
                                    <input type="text" name="st_1" class="form-control"
                                        value="{{ $user->education->st_1 }}" />
                                    @error('st_!')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bằng tiến sĩ chuyên ngành</label>
                                <div class="col-sm-9">
                                    <input type="text" name="st_2" class="form-control"
                                        value="{{ $user->education->st_2 }}" />
                                    @error('st_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nơi đào tạo </label>
                                <div class="col-sm-9">
                                    <input type="text" name="tp_1" class="form-control"
                                        value="{{ $user->education->tp_1 }}" />
                                    @error('tp_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nơi đào tạo</label>
                                <div class="col-sm-9">
                                    <input type="text" name="tp_2" class="form-control"
                                        value="{{ $user->education->tp_2 }}" />
                                    @error('tp_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Năm cấp bằng</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gy_1" class="form-control"
                                        value="{{ $user->education->gy_1 }}" />
                                    @error('gy_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Năm cấp bằng</label>
                                <div class="col-sm-9">
                                    <input type="text" name="gy_2" class="form-control"
                                        value="{{ $user->education->gy_2 }}" />
                                    @error('gy_2')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Afteredu -->
            <!-- workprocess -->
            <div class="card mt-5">
                <div class="card-body">
                    <h4 class="card-title">Quá trình công tác</h4>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Thời gian</label>
                                <div class="col-sm-9">
                                    <input type="text" name="time" class="form-control"
                                        value="{{ $user->education->time }}" />
                                    @error('time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nơi công tác</label>
                                <div class="col-sm-9">
                                    <input type="text" name="location" class="form-control"
                                        value="{{ $user->education->location }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Công việc </label>
                                <div class="col-sm-9">
                                    <input type="text" name="job" class="form-control"
                                        value="{{ $user->education->job }}" />
                                    @error('job')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="btn-form-update mt-3">
                        <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                        <a type="button" href='{{ route('profile') }}' class="btn btn-light">Hủy</a>
                    </div>
                </div>

    </form>
@endsection
