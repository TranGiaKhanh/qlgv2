@extends('layouts.master')
@section('title')
   Thời khóa biểu
@endsection
@section('content')
    <div class="col-lg-12 grid-margin stretch-card background-color-grey">
        <div class="card">
            <div class="card-body">
                    <div class="form-group">
                        <form method="post" action="{{route('schedules.importSchedule')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
@endsection
