<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin()
    {
        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        $authenticated = auth('admin')->attempt(['email'=>$data['email'],'password' => $data['password']]);
        if(!$authenticated)
            return back();

        return redirect()->route('admin.home');
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin.auth.login');

    }

}
