@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <h6 class="alert alert-success">
                {{ session()->get('success') }}
            </h6>
        @endif
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Lý lịch sơ lược</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30">
                            @if (isset(Auth::user()->image))
                                <img style="border-radius: 50%" src="{{ asset('images/' . Auth::user()->image) }}"
                                    alt="profile" width="150px" />
                            @else
                                <img style="border-radius: 50%" src="{{ asset('uploads/' . 'avatar.png') }}" alt="avatar"
                                    width="150px" />
                            @endif
                            <h4 class="card-title m-t-10">{{ Auth::user()->name }}</h4>
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
                                    <label class="col-md-12"><b>Họ và tên</b></label>
                                    <div class="col-md-12">
                                        <span>{{ Auth::user()->name }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12"><b>Giới tính</b></label>
                                    <div class="col-md-12">
                                        <span>{{ Auth::user()->gender }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Email</b></label>
                                    <div class="col-md-12">
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Ngày sinh</b></label>
                                    <div class="col-md-12">
                                        <span>{{ Auth::user()->birthday }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12"><b>Số điện thoại</b></label>
                                    <div class="col-md-12">
                                        <span>{{ Auth::user()->phone }}</span>
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
                        {{-- <div class="form-group">
                            <div class="col-sm-12">
                                <a href="{{ route('profiles.showFormUpdateProfile', $user->id) }}"
                                    class="btn btn-primary">
                                    <i class="ti-marker-alt text-white"></i>
                                </a>
                                @can(config('const.ROLE.ADMIN'))
                                    <a class="btn btn-danger" href="#" data-toggle="modal"
                                        data-target="#modal-reset{{ $user->id }}">
                                        <i class="ti-reload text-white" aria-hidden="true"></i>
                                    </a>
                                @endcan
                            </div> --}}
                        @include('modals.reset-password')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Học vấn</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12"><b>Hệ đào tạo</b></label>
                                <div class="col-md-12">
                                    <span>{{ Auth::user()->name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-email" class="col-md-12"><b>Nơi đào tạo</label>
                                <div class="col-md-12">
                                    <span>{{ Auth::user()->gender }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12"><b>Ngành học</b></label>
                                <div class="col-md-12">
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12"><b>Năm tốt nghiệp</b></label>
                                <div class="col-md-12">
                                    <span>{{ Auth::user()->birthday }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
