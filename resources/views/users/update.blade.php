@extends('layouts.master')
@section('title', 'CHỉnh sửa thông tin')
@section('content')
    @if (session()->has('error'))
        <h6 class="alert alert-danger">
            {{ session()->get('error') }}
        </h6>
    @endif
    <form action="{{ route('users.update', $user->id) }}" class="form-sample" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        <div class="col-12 grid-margin mb-5 pb-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thông tin</h4>
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Họ và tên <span
                                        class="text-danger">*</span></label>
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
                                <label class="col-sm-3 col-form-label">Email<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="hidden" name="email" class="form-control" value="{{ $user->email }}" />
                                    <input type="text" name="emailOld" class="form-control" value="{{ $user->email }}" disabled/>
                                    @error('email')
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
                                <label class="col-sm-3 col-form-label"> Giới tính <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="gender">
                                        <option>--Chọn Giới tính--</option>
                                        <option value="Nam"  {{ $user->gender == 'Nam' ? 'selected' : ''}}>Nam</option>
                                        <option value="Nữ"  {{  $user->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                    @error('department_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Khoa <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="department_id">
                                        <option>--Chọn khoa--</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                                @if ($department->id == $user->department_id) selected @endif>{{ $department->name }}
                                            </option>
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
                                <label class="col-sm-3 col-form-label">Chức vụ<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role_id">
                                        <option>--Chức vụ--</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                @if ($role->id == $user->role_id) selected @endif>{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
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
                                <label class="col-sm-3 col-form-label">Bằng thạc sĩ chuyên ngành</label>
                                <div class="col-sm-9">
                                    <input type="text" name="st_1" class="form-control"
                                        value="{{ $user->afteredu->st_1 }}" />
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
                                    <input type="text" name="st_2" class="form-control"
                                        value="{{ $user->afteredu->st_2 }}" />
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
                                        value="{{ $user->afteredu->tp_1 }}" />
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
                                        value="{{ $user->afteredu->tp_2 }}" />
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
                                        value="{{ $user->afteredu->gy_1 }}" />
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
                                        value="{{ $user->afteredu->gy_2 }}" />
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

                    @foreach($user->workprocess as $work)

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label"> Thời gian</label>
                                <div class="col-sm-9">
                                    <input type="text" name="time" class="form-control"
                                        value="{{ $work->time }}" />
                                    @error('time')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Công việc </label>
                                <div class="col-sm-9">
                                    <input type="text" name="job" class="form-control"
                                           value="{{ $work->job }}" />
                                    @error('job')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nơi công tác</label>
                                <div class="col-sm-9">
                                    <input type="text" name="location" class="form-control"
                                        value="{{ $work->location }}" />
                                    @error('location')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                <button type="button" onclick="window.location.href='{{ route('users.index') }}'"
                        class="btn btn-light">Hủy</button>
            </div>
        </div>
    </form>
@endsection
