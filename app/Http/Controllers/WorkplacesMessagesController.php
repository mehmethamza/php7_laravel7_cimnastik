<?php

namespace App\Http\Controllers;

use App\Models\Workplaces;
use App\Models\WorkplacesMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function getUser($workplace)
{
    $workplace = Workplaces::find($workplace);
    return $workplace -> workplaceSeller;
}
function getMessages()
{
    return auth()->user()->userMessages;
}
class WorkplacesMessagesController extends Controller
{
    public function store(Request $request)
    {
        $message = new WorkplacesMessages();
        $message->workplace_id = decrypt($request->workplace_id);
        $message->user_id = getUser(decrypt($request->workplace_id))->id;
        $message->name = $request->name;
        $message->phone = $request->phone;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->preferred_contact = $request->preferred_contact;
        $message->save();

    }
    public function index()
    {
        $messages = getMessages();
        return view("dashboard.messages.index",compact("messages"));
    }
    public function replyMessage(Request $request)
    {
        $message = WorkplacesMessages::find(decrypt($request->message_id));
        $message->reply = true;
        $message->save();
        return back();
    }
}
