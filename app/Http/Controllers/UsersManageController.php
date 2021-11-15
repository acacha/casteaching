<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tests\Feature\Users\UsersManageControllerTest;

class UsersManageController extends Controller
{
    public static function testedBy()
    {
        return UsersManageControllerTest::class;
    }

    public function index()
    {
        return view('users.manage.index',[
            'users' => User::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
