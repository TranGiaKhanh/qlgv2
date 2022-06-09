@extends('layouts.master')
@section('title')
    Thời khóa biểu
@endsection
@section('content')
    <div class="col-lg-12 grid-margin stretch-card background-color-grey">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <form method="post" action="{{ route('schedules.importSchedule') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <button type="button" class="btn btn-danger btn-delete-schedules">Xóa</button>
                    </form>
                    @error('file')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <h4 class="card-title">Thời khóa biểu</h4>
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
                    @can(config('const.ROLE.ADMIN'))
                        <th scope="col"></th>
                        @endcan
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
                                    {{ $schedule->location }}
                                </td>
                                <td>
                                    {{ $schedule->time }}
                                </td>
                                <td>
                                    {{ $schedule->value }}
                                </td>
                                <td>
                                    {{ $schedule->user->name }}
                                </td>
                                </td>
                                @can(config('const.ROLE.ADMIN'))
                                    <td>
                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                           data-target="#ModalDelete{{ $schedule->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="delete_form_{{ $schedule->id }}" method="get"
                                              action="{{ route('schedules.delete', $schedule->id) }}"
                                              style="display:none">
                                            @csrf
                                        </form>
                                    </td>
                                @endcan
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

    <script>
        $('.btn-delete-schedules').on('click', function () {
            Swal.fire({
                title: 'Bạn có chắc chắn?',
                text: "Bạn sẽ không thể hoàn tác lại!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng!',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Đã xóa!',
                        '',
                        'success'
                    )

                    window.location = '{{ route('schedules.delete_all') }}'
                }
            })
        })
    </script>
@endsection
