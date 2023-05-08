<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function storeMessage(MessageRequest $request)
    {
        Message::create($request->except('_token'));

        return back();
    }
}
