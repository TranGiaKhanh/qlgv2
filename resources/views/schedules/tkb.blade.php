@extends('layouts.master')
@section('title')
   Thời khóa biểu
@endsection
@section('content')
    <div class="col-lg-12 grid-margin stretch-card background-color-grey">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lịch dạy</h4>
                <p class="card-description">
                </p>
                @if (session()->has('success'))
                    <h3 class="alert alert-success">
                        {{ session()->get('success') }}
                    </h3>
                @endif
                <table class="table table-hover" style="text-align:center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên lớp</th>
                            <th scope="col">Thời gian</th>
                            <th scope="col">Địa điểm</th>
                            <th scope="col">Buổi</th>
                            <th scope="col">số tiết</th>
                            <th scope="col">Giảng viên</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($schedules))
                            @foreach ($schedules as $key => $schedule)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $schedule->class->name }}
                                    </td>
                                    <td>
                                        {{ $schedule->date }}
                                    </td>
                                    <td>
                                        {{ $schedule->location}}
                                    </td>
                                    <td>
                                        {{$schedule->time}}
                                    </td>
                                    <td>
                                        {{ $schedule->value }}
                                    </td>
                                    <td>
                                        {{ $schedule->user->name }}
                                    </td>
                                    </td>
                                    @include('modals.delete-schedules')
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="12">Không tìm thấy trang</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $schedules->links() }}
            </div>
        </div>
    </div>
@endsection
