<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\Education\EducationRepository;
use App\Repositories\Afteredu\AftereduRepository;
use App\Repositories\WorkProcess\WorkProcessRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Intervention\Image\ImageManagerStatic as Image;
use App\Repositories\Department\DepartmentRepositoryInterface;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $user, DepartmentRepositoryInterface $department,
    RoleRepositoryInterface $role, EducationRepository $eduRepo,
    AftereduRepository $afteduRepo, WorkProcessRepository $work)
    {
        $this->user = $user;
        $this->department = $department;
        $this->role = $role;
        $this->eduRepo = $eduRepo;
        $this->afteduRepo = $afteduRepo;
        $this->work = $work;
    }

    public function index(Request $request)
    {
        $data = $request->only('department_id', 'keyword');
        if (Auth::user()->is_admin) {
            $users = $this->user->getAllFilter($data);
            $departments = $this->department->getAll();
        } else {
            // $data['department_id'] = Auth::user()->department_id;
            // $data['role_id'] = config('const.ROLE_EMPLOYEE');
            $users = $this->user->getAllFilter($data);
            $departments = $this->department->getAll();
        }
        return view('users.list', compact('users', 'departments'));
    }

    public function create()
    {
        if (Gate::allows(config('const.ROLE.ADMIN'))) {
            $departments = $this->department->getAll();
            $roles = $this->role->getAll();
            $workproces = [
                []
            ];
            return view('users.create', compact('departments', 'roles'));
        } else {
            abort(403);
        }
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->only('email','phone','name','gender','birthday','address','role_id','department_id','is_admin');
        $data['password'] = Hash::make($request->password);
        $checkManager = $this->user->findManager($data['department_id']);
        if (isset($checkManager) && $data['role_id'] == config('const.ROLE_MANAGER')) {
            return redirect()->back()->with('error', 'Phòng này đã có trưởng khoa !');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            File::makeDirectory('images', $mode = 0777, true, true);
            $image_resize->save(public_path('images/' . $filename));
            $data['image'] = $filename;
            if (!empty($request->old_image)) {
                Storage::delete('images/' . $request->old_image);
            }
        }

        $data['first_login'] = config('const.FIRSTLOGIN');
        $user = User::create($data);

        //edu
        $data = $request->only('ts','tp','disciplines','gy');
        $data['user_id'] = $user->id;
        $this->eduRepo->store($data);

        //after edu
        $data = $request->only('st_1','tp_1','gy_1','st_2','tp_2','gy_2');
        $data['user_id'] = $user->id;
        $this->afteduRepo->store($data);

        //after edu
        $data = $request->only('time','location','job');
        $data['user_id'] = $user->id;
        $this->work->store($data);

        return redirect()->route('users.index')->with('success', 'Thêm mới thành công !');
    }

    public function edit(Request $request, $id)
    {
        if (Gate::allows(config('const.ROLE.ADMIN')) || $request->user()->id == $id) {
            $departments = $this->department->getAll();
            $roles = $this->role->getAll();
            $user = $this->user->getById($id);
            return view('users.update', compact('user', 'departments', 'roles'));
        } else {
            abort(403);
        }
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if (Auth::user()->id == $id && Auth::user()->role_id != $request->role_id) {
            return redirect()->route('users.edit', $id)->with('error', 'Không thể thay quyền của chính mình !');
        }
        $data = $request->only('email','phone','name','gender','birthday','address','role_id','department_id','is_admin');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300)->save(public_path('images/' . $filename));
            // $image_resize->
            $data['image'] = $filename;
            if (!empty($request->old_image)) {
                Storage::delete('images/' . $request->old_image);
            }
        }
        $user = User::findOrFail($request->route('user'));
        $user->update($data);
        $data = $request->only('ts', 'tp', 'disciplines', 'gy');
        $this->eduRepo->update($data, $user->education->id);
        $data = $request->only('st_1', 'tp_1', 'gy_1', 'st_2', 'tp_2', 'gy_2');
        $this->afteduRepo->update($data, $user->afteredu->id);

        if (Gate::allows(config('const.ROLE.ADMIN'))) {
            return redirect()->route('users.index')->with('success', 'Cập nhật thành công !');
        }

        return redirect()->route('profile')->with('success', 'Cập nhật thành công !');
    }

    public function destroy($id)
    {
        if (Gate::allows(config('const.ROLE.ADMIN'))) {
            if (Auth::user()->id == (int)$id) {
                return redirect()->route('users.index')->with('error', 'Xóa thất bại!');
            } else {
                $this->user->destroy($id);
                return redirect()->route('users.index')->with('Success', 'Xóa thành công! ');
            }
        } else {
            abort(403);
        }
    }

    public function show($id)
    {
        $user = $this->user->getById($id);
        return view('pages.profile', compact('user'));
    }

    public function showProfile()
    {
        $user = $this->user->getById(Auth::user()->id);
        return view('pages.profile', compact('user'));
    }

    public function showFormUpdateProfile($id)
    {
            $user = $this->user->getById(Auth::user()->id);
            return view('pages.update-profile', compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request, $id)
    {
        //Update profile
        $data = $request->only('name', 'address', 'birthday', 'phone');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save(('images/' . $filename));
            $data['image'] = $filename;
            if (!empty($request->old_image)) {
                Storage::delete('images/' . $request->old_image);
            }
        }
        $this->user->update($data, $id);

        //Update education
        $data = $request->only('ts', 'tp', 'disciplines', 'gy');
        $this->eduRepo->update($data, $request->user()->education->id);
        $data = $request->only('st_1', 'tp_1', 'gy_1', 'st_2', 'tp_2', 'gy_2');
        $this->afteduRepo->update($data, $request->user()->afteredu->id);
        $data = $request->only('time', 'location', 'job');
        $this->work->update($data, $request->user()->workprocess->id);
        return redirect()->route('profile')->with('success', 'Cập nhật thành công !');
    }

    public function export(Excel $excel, Request $request)
    {
        $data = $request->all();
        $export = app()->makeWith(UserExport::class, compact('data'));
        $name =  uniqid() . '_user_information';
        return $excel->download($export, $name . '.xlsx');
    }
}
