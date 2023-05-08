<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index()
    {
        $data['setting'] = Setting::first();
        return view('site.contacts.index',$data);
    }
}
