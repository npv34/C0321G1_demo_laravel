<?php


namespace App\Http\Services;


use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserRepository $userRepo;
    public function __construct(UserRepository  $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getAll() {
        return $this->userRepo->getAll();
    }

    public function create($request) {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $this->userRepo->store($user, $request->role_id);
    }

    public function getById($id) {
        return $this->userRepo->getById($id);
    }

    public function delete($id) {
        $user = $this->getById($id);
        $this->userRepo->destroy($user);
    }
}
