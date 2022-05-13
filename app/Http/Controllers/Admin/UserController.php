<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    protected $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function index($role = \App\Role::ROLE['MEMBER'])
    {
        $roles = $this->roleRepository->getRolesByRole(\App\Role::ROLE['ADMIN']);
        if (isset($_GET['role'])) {
            $role = $_GET['role'];
        }
        $users = $this->userRepository->findAllBy('role_id', $role);

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
        $result = $this->userRepository->create($user_data);

        return back()->with('success', 'Thêm mới thành công!');
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

    public function update(CreateUserRequest $request, $id)
    {
        $user_data = $request->input();
        unset($user_data['password']);
        $user = $this->userRepository->find($id);
        $result = $this->userRepository->update($user, $user_data);

        return back()->with('success', 'Cập nhật thành công!');
    }

    public function destroy($id)
    {
        $user = $this->userRepository->find($id);
        $result = $this->userRepository->delete($user);

        return back()->with('success', 'Xóa thành công!');
    }
}
