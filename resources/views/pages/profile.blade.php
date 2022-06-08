@extends('layouts.master')
@section('title', 'Thông tin')
@section('content')
    <div class="container-fluid mt-2 mb-5 pb-5">
        @if (session()->has('success'))
            <h6 class="alert alert-success">
                {{ session()->get('success') }}
            </h6>
        @endif
        <div class="row page-titles">
            <div class="col-10 align-self-center">
                <h3 class="text-themecolor">Lý lịch sơ lược</h3>
            </div>
            <div class="col-2">
                <a href="{{ route('users.edit', $user->id) }}"
                   class="btn btn-primary">
                    <i class="ti-marker-alt text-white"></i>
                </a>
{{--                @can(config('const.ROLE.ADMIN'))--}}
{{--                    <a class="btn btn-danger" href="#" data-toggle="modal"--}}
{{--                       data-target="#modal-reset{{ $user->id }}">--}}
{{--                        <i class="ti-reload text-white" aria-hidden="true"></i>--}}
{{--                    </a>--}}
{{--                @endcan--}}
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            @if (isset($user->image))
                                <img style="border-radius: 50%" src="{{ asset('images/' . $user->image) }}"
                                    alt="profile" width="150px" />
                            @else
                                <img style="border-radius: 50%" src="{{ asset('uploads/' . 'avatar.png') }}" alt="avatar"
                                    width="150px" />
                            @endif
                            <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Họ và tên:</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12"><b>Giới tính:</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->gender }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Email</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Ngày sinh</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->birthday }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Số điện thoại</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->phone }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Chức vụ</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->role->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Khoa</b></label>
                                    <div class="col-md-12">
                                        <span>{{ $user->department->name }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        @include('modals.reset-password')--}}
                    </div>
                </div>
            </div>

            <div class="mt-5 col-lg-4 col-xlg-3 col-md-5">
                    <h3 class="text-themecolor">Học vấn đại học</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Hệ đào tạo : </b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->education->ts ?? __('admin.null_data') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12"><b>Nơi đào tạo</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->education->tp ?? __('admin.null_data')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Ngành học</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->education->disciplines ?? __('admin.null_data')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Năm tốt nghiệp</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->education->gy ?? __('admin.null_data')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="mt-5 col-lg-8 col-xlg-9 col-md-7">
                    <h3 class="text-themecolor">Sau tốt nghiệp</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Bằng thạc sĩ chuyên ngành: </b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->st_1 ?? __('admin.null_data') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12"><b>Nơi đào tạo</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->tp_1 ?? __('admin.null_data') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Năm tốt nghiệp</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->gy_1 ?? __('admin.null_data')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Bằng tiến sĩ chuyên ngành : </b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->st_2 ?? __('admin.null_data') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12"><b>Nơi đào tạo</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->tp_2 ?? __('admin.null_data') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-12"><b>Năm tốt nghiệp</b></label>
                                        <div class="col-md-12">
                                            <span>{{ $user->afteredu->gy_2 ?? __('admin.null_data')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="mt-5 col-12">
                <h3 class="text-themecolor">Quá trình công tác</h3>
                <div class="row">
                   <table class="w-100 table">
                       <thead>
                       <tr>
                           <th>#</th>
                           <th>Thời gian</th>
                           <th>Nơi công tác</th>
                           <th>Công việc đảm nhận</th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           @foreach($user->workprocess as $work)
                           <tr>
                               <td>{{ $loop->index + 1 }}</td>
                               <td>{{ $work->time }}</td>
                               <td>{{ $work->location }}</td>
                               <td>{{ $work->job }}</td>
                           </tr>
                           @endforeach
                       </tr>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>

@endsection
