<?php


namespace App\Http\Repositories;


use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    protected User $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->userModel->with('group', 'roles')->get();
    }

    function store($user, $rolesId)
    {
        DB::beginTransaction();
        try {
            $user->save();
            $user->roles()->sync($rolesId);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }

    function getById($id)
    {
        return $this->userModel->findOrFail($id);
    }

    function destroy($user)
    {
        DB::beginTransaction();
        try {
            $user->roles()->detach();
            $user->delete();
            DB::commit();
            toastr()->success('Delete success');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Delete error');
        }
    }
}
