<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    function index() {
        $users = $this->userService->getAll();
        $data = [
            'status' => 'success',
            'data' => $users,
        ];
        return response()->json($data);
    }
}
