<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ScheduleImport;
use App\Models\Schedule;
use Maatwebsite\Excel\Facades\Excel;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Classes\ClassesRepositoryInterface;

class ScheduleController extends Controller
{
    function __construct(
        ScheduleRepositoryInterface $schedules,
        UserRepositoryInterface $user,
        ClassesRepositoryInterface $classes
    ) {
        $this->schedule = $schedules;
        $this->user = $user;
        $this->classes = $classes;
    }

    public function index(Request $request)
    {
        $schedules = $this->schedule->getAllSchedules();
        return view('schedules.list', compact('schedules'));
    }

    public function tkb(Request $request)
    {
        $classes = $this->classes->getAll();
        $users = $this->user->getAll();
        $schedules = Schedule::where('teacher', $request->user()->id)->paginate(10);
        return view('schedules.tkb', compact('schedules', 'classes', 'users'));
    }

    public function import()
    {
        return view('schedules.import');
    }

    public function importSchedule(Request $request)
    {
        $messageErrFile = 'Bạn phải chọn một file excel đuôi xls hoặc xlsx';
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ], [
            'file.required' => $messageErrFile,
            'file.file' => $messageErrFile,
            'file.mimes' => $messageErrFile
        ]);

        Excel::import(new ScheduleImport, $request->file('file'));
        return redirect()->route('schedules.index')->with('success');
    }

    public function destroy($id)
    {
        $this->schedule->destroy($id);
        return redirect()->route('schedules.index')->with('success');
    }

    public function destroyAll()
    {
        Schedule::truncate();

        return redirect()->route('schedules.index')->with('success', 'Xóa thành thành công !');
    }
}
