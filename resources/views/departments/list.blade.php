@extends('layouts.master')
@section('title')
    Danh sách khoa
@endsection
@section('content')
    <div class="col-lg-12 grid-margin stretch-card background-color-grey">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Danh sách khoa</h4>
                <p class="card-description">
                </p>
                @if (session()->has('success'))
                    <h3 class="alert alert-success">
                        {{ session()->get('success') }}
                    </h3>
                @endif
                <table class="table table-striped" style="text-align:center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tên khoa</th>
                            <th>Trạng thái</th>
                            <th>Trưởng khoa</th>
                            <th>Create at</th>
                            <th>Update at</th>
                            @can(config('const.ROLE.ADMIN'))
                            <th>Action</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($departments))
                            @foreach ($departments as $key => $department)
                                <tr>
                                    <td class="py-1">
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $department->name }}
                                    </td>
                                    <td>
                                        {{ $department->status }}
                                    </td>
                                    <td>
                                        {{ $department->manager }}
                                    </td>
                                    <td>
                                        {{ $department->created_at->format("d/m/Y") }}
                                    </td>
                                    <td>
                                        {{ $department->updated_at->format("d/m/Y") }}
                                    </td>
                                    @can(config('const.ROLE.ADMIN'))
                                    <td>
                                        <a href="{{ route('departments.sua', $department->id) }}"
                                            class="btn btn-primary mr-2">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-danger" href="#" data-toggle="modal"
                                            data-target="#ModalDelete{{ $department->id }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                        <form id="delete_form_{{ $department->id }}" method="get"
                                            action="{{ route('departments.destroy', $department->id) }}"
                                            style="display:none">
                                            @csrf
                                        </form>
                                    </td>
                                    @endcan
                                    @include('modals.delete-khoa')
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="12">Không tìm thấy trang</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection
