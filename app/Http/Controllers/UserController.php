<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Services\UserService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = $this->userService->getAll();
        $message = 'xin chao cac ban';
        return view('admin.users.list', compact('users', 'message'));
    }

    function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $this->isPermission('manage-user');
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.add', compact('groups', 'roles'));
    }

    function update($id)
    {
        $this->isPermission('manage-user');
        $user = User::findOrFail($id);
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.edit', compact('groups', 'roles', 'user'));
    }

    function show($id)
    {
        $user = User::with('group', 'roles')->findOrFail($id);
        return response()->json($user);
    }

    function search(Request $request)
    {
        // code chuc nangg search
        $keyword = $request->keyword;
        $users = User::with('group', 'roles')
            ->where('name', 'LIKE', '%' . $keyword . '%')
            ->get();
        $data = [
            "status" => "success",
            "data" => $users
        ];

        return response()->json($data);
    }

    function store(CreateUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->create($request);
        return redirect()->route('users.index');
    }

    function delete($id)
    {
        $this->userService->delete($id);
        return redirect()->route('users.index');
    }

    function edit(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user = User::findOrFail($id);
            $user->fill($request->all());
            $user->save();
            $user->roles()->sync($request->role_id);
            DB::commit();
            toastr()->success('Edit success');
        } catch (\PDOException $exception) {
            DB::rollBack();
            toastr()->error('Error database');
        }
        return redirect()->route('users.index');
    }
}
