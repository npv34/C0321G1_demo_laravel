<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $users = [
            [
                "id" => 1,
                "username" => "toilatien",
                "name" => "Pham Van Tien",
                "email" => "tien@gmail.com"
            ],
            [
                "id" => 2,
                "username" => "nam",
                "name" => "Pham Van Nam",
                "email" => "nam@gmail.com"
            ]
        ];
        return view('users.list', compact('users'));
    }

    function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.add');
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
}
