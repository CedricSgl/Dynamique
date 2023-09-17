<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = \App\Models\Message::paginate(10);
        return view('message.index', ['title' => 'Mon super titre','messages' => $messages]);
    }

    public function show(string $id) : View
    {
        //TODO Use query builder for join, or change the message table (add customer info)
        $message = \App\Models\Message::findOrFail($id);
        return view('message.show', ['title' => 'Mon message','message' => $message]);
        //return $message;
    }

    public function create(){
        return view('message.create');
    }
}
