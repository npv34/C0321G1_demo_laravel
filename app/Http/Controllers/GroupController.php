<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    function getUsers($idGroup)
    {
        $group = Group::findOrFail($idGroup);
        $users = $group->users;

    }

    function destroy($idGroup)
    {

        DB::beginTransaction();
        try {
            $group = Group::findOrFail($idGroup);
            $group->users()->update(['group_id' => null]);
            $group->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            echo $e->getMessage();
        }
    }

    function index() {
        return view('admin.groups.list');
    }
}
