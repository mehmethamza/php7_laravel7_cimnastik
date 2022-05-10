<?php

namespace App\Http\Controllers;

use App\Models\Workplaces;
use App\Models\WorkplacesComments;
use Illuminate\Http\Request;

function getUser($workplace)
{
    $workplace = Workplaces::find($workplace);
    return $workplace -> workplaceSeller;
}

class WorkplacesCommentsController extends Controller
{
    public function store(Request $request)
    {
        $comment = new WorkplacesComments();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->workplace_id = decrypt($request->workplace_id);
        $comment->rating_service = $request->rating_service;
        $comment->rating_communacation = $request->rating_communacation;
        $comment->rating_advice = $request->rating_advice;
        $comment->rating_average = ($request->rating_advice+$request->rating_service+$request->rating_communacation)/3;
        $seller_id = getUser(decrypt($request->workplace_id))->id;
        $comment->user_id = $seller_id;
        // $comment->user_id real seller
        $comment->status = "passive";
        if (auth()->check() && auth()->user()->id == $seller_id )
        {
            $comment->type = "seller";
            try
            {
                $comment->pid = decrypt($request->pid);
            }
            catch (\Throwable $th)
            {

            }
        }
        else
        {
            $comment->type = "customer";
        }
        $comment->save();
        return back()
        ->with("alert","Yorumunuz başarıyla eklendi")
        ->with("alert_type","success");
    }
}
