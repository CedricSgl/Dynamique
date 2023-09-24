<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MessageController extends Controller
{
    public function index(): View
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(10);
        return view('message.index', ['title' => 'Mes Messages','messages' => $messages]);
    }

    public function show(string $id) : View
    {
        $message = Message::findOrFail($id);
        return view('message.show', ['title' => 'Mon message','message' => $message]);
    }

    public function store(/*Request $request*/MessageRequest $request )
    {
        Message::create($request->validated());
        return response()->json([
            'message' => 'Merci pour votre message, <br>nous le traiterons le plus rapidement possible et, le cas échéant, reviendrons vers vous.',
        ]);
    }
}
