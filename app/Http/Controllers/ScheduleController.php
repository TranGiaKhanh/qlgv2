<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ScheduleImport;
use App\Models\Schedule;
use App\Http\Requests\ScheduleRequest;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Classes\ClassesRepositoryInterface;

class ScheduleController extends Controller
{
    function __construct(ScheduleRepositoryInterface $schedules, UserRepositoryInterface $user, ClassesRepositoryInterface $classes)
    {
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
        $classes = $this -> classes->getAll();
        $users = $this -> user -> getAll();
        $schedules = $this->schedule->getAllSchedules();
        return view('schedules.tkb', compact('schedules','classes','users'));
    }
    public function import()
    {
        return view('schedules.import');
    }
    public function importSchedule(Request $request)
    {
        dd($request->all());
        // Excel::import(new ScheduleImport, request()->file('file'));
        // return redirect()->route('schedules.index')->with('success');
    }
    public function destroy($id)
    {
        $this->schedule->destroy($id);
        return redirect()->route('schedules.index')->with('success');
    }
}
