<?php


namespace App\Http\Repositories;


use App\Models\User;

class UserRepository
{
    protected User $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->userModel->all();
    }

    function store($obj) {
        $obj->save();
    }

    function getById($id) {
        return $this->userModel->findOrFail($id);
    }

    function destroy($user) {
        $user->delete();
    }
}
