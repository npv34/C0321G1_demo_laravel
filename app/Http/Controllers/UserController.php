<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
        $groups = Group::all();
        $roles = Role::all();
        return view('admin.users.add', compact('groups', 'roles'));
    }

    function update($id) {
        echo $id;
    }

    function show($id){
        echo "show";
    }

    function search(Request $request) {
        echo $request->keyword;
    }

    function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->create($request);
        return redirect()->route('users.index');
    }

    function delete($id) {
        $this->userService->delete($id);
        $message = 'Xoa thanh cong';
        session()->flash('delete-success', $message);
        return redirect()->route('users.index');
    }
}
