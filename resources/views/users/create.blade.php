@extends('layouts.master')
@section('title', 'Thêm giảng viên')
@section('content')
    @if (session()->has('error'))
        <h6 class="alert alert-danger">
            {{ session()->get('error') }}
        </h6>
    @endif
    <form action="{{ route('users.store') }}" class="form-sample" method="post" enctype="multipart/form-data">

        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm giảng viên</h4>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Họ tên <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="username@gmail.com" />
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Số điện thoại </label>
                                <div class="col-sm-9">
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" />
                                    @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" />
                                    @error('password')
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
                                        value="{{ old('birthday') }}" placeholder="ex: y-m-d" />
                                    @error('birthday')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Giới tính <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender">
                                        <option>--Chọn Giới tính--</option>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                    @error('department_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Khoa <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="department_id">
                                        <option>--Chọn khoa--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role_id">
                                        <option>--Select Role--</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
                                        value="{{ old('address') }}" />
                                    @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>File upload</label><br>
                        <input type="file" name="image">
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
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
                                    <input type="text" name="ts" class="form-control" />
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
                                    <input type="text" name="tp" class="form-control" />
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
                                    <input type="text" name="disciplines" class="form-control" />
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
                                    <input type="text" name="gy" class="form-control" />
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
                                    <input type="text" name="st_1" class="form-control" />
                                    @error('st_1')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Bằng tiến sĩ chuyên ngành</label>
                                <div class="col-sm-9">
                                    <input type="text" name="st_2" class="form-control" />
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
                                    <input type="text" name="tp_1" class="form-control" />
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
                                    <input type="text" name="tp_2" class="form-control" />

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
                                    <input type="text" name="gy_1" class="form-control" />

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
                                    <input type="text" name="gy_2" class="form-control" />

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
                                    <input type="text" name="time" class="form-control" />

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
                                    <input type="text" name="location" class="form-control" />

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
                                    <input type="text" name="job" class="form-control" />

                                    @error('job')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn  btn-primary mr-2 ">Thêm</button>
            <button type="button" onclick="window.location.href='{{ route('users.index') }}'" class="btn btn-light">Hủy
            </button>
    </form>
@endsection
