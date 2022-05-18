<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Repositories\ImageRepository;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userRepository;
    protected $roleRepository;
    protected $imageRepository;

    public function __construct(
        UserRepository $userRepository,
        RoleRepository $roleRepository,
        ImageRepository $imageRepository
    ) {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index($role = \App\Role::ROLE['MEMBER'])
    {
        $roles = $this->roleRepository->getRolesByRole(\App\Role::ROLE['ADMIN']);
        if (isset($_GET['role'])) {
            $role = $_GET['role'];
        }
        $users = $this->userRepository->getBuilder()->where('role_id', $role)->paginate(10);

        return view('admin.user.index')->with([
            'users' => $users,
            'roles' => $roles,
            'target_role' => $role,
        ]);
    }

    public function create()
    {
        $roles = $this->roleRepository->getRolesByRole(Auth::user()->role_id);

        return view('admin.user.create')->with('roles', $roles);
    }

    public function store(CreateUserRequest $request)
    {
        $user_data = $request->input();
        $user_data['password'] = Hash::make($user_data['password']);

        DB::beginTransaction();
        try {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $ext = $request->avatar->extension();
                $file_name = time() . '_' . 'user.' . $ext;
                $path = 'uploads/images/user';
                $file->move(public_path($path), $file_name);

                $img_data = [];
                $img_data['path'] = $path . '/' . $file_name;

                $img = $this->imageRepository->create($img_data);

                $user_data['avatar'] = $img->id;
            }
            $result = $this->userRepository->create($user_data);

            DB::commit();

            return back()->with('success', 'Thêm mới thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = $this->roleRepository->getRolesByRole(Auth::user()->role_id);

        return view('admin.user.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user_data = $request->input();
        unset($user_data['password']);

        DB::beginTransaction();
        try {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                $ext = $request->avatar->extension();
                $file_name = time() . '_' . 'user.' . $ext;
                $path = 'uploads/images/user';
                $file->move(public_path($path), $file_name);

                $img_data = [];
                $img_data['path'] = $path . '/' . $file_name;

                $img = $this->imageRepository->create($img_data);

                $user_data['avatar'] = $img->id;
            }
            $user = $this->userRepository->find($id);
            $result = $this->userRepository->update($user, $user_data);

            DB::commit();

            return back()->with('success', 'Cập nhật thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' Line: ' . $e->getLine());
            return back();
        }
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        $result = $this->userRepository->delete($user);

        return back()->with('success', 'Xóa thành công!');
    }
}
