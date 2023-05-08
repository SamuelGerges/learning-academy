<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function storeNewsletter(NewsletterRequest $request)
    {
        Newsletter::create($request->except('_token'));
        return back();
    }
}
