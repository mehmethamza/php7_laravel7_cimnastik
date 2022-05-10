<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifySellerAccount;
use App\Models\Workplaces;
use App\Models\WorkplacesNews;
use Illuminate\Http\Request;
use App\Http\Controllers\EditListingController;

class WorkplacesNewsController extends Controller
{
    public function listing(Request $request,$workplace_slug)
    {
        $editListigController = new  EditListingController();
        $workplace = Workplaces::where("slug",$workplace_slug)->first();
        if (!$editListigController -> verifyWorkplaceSeller($workplace)) {
            return back();
        }
        if ($editListigController->verifyWorkplacePaying($workplace) != false) {
            return $editListigController->verifyWorkplacePaying($workplace);
        }
        $news = $workplace->workplaceNews;
        return view("dashboard.workplace_news.news_listing.index",compact("news","workplace"));
    }
    public function editPage(Request $request)
    {
        $news = decrypt($request->news_id);
        $news = WorkplacesNews::find($news);
        return view("dashboard.workplace_news.edit_news.index",compact("news"));
    }
    public function storePage(Request $request)
    {
        $workplace = decrypt($request->workplace_id);
        $workplace = Workplaces::find($workplace);
        return view("dashboard.workplace_news.add_news.index",compact("workplace"));
    }
    public function store(Request $request,FileController $file)
    {
        $news = new WorkplacesNews();
        $news->workplace_id = decrypt($request->workplace_id);
        $news->title = $request->title;
        $news->content=$request->content;
        $news->image=$file->uploadImage($request->image);
        $news->save();
        return redirect()->route("dashboard.news.listing" , $news -> getWorkplace -> slug)
        ->with("alert","".$news->title.""." haberiniz başarıyla eklendi")
        ->with("alert_type","success");
    }
    public function edit(Request $request,FileController $file)
    {
        $news = WorkplacesNews::find(decrypt($request->news_id));
        $news->title = $request->title;
        $news->content=$request->content;
        if (!empty($request->image)) {
            $file->deleteImage($news->image);
            $news->image=$file->uploadImage($request->image);
        }
        $news->save();
        return redirect()->route("dashboard.news.listing",$news -> getWorkplace -> slug)
        ->with("alert","".$news->title.""." haberiniz başarıyla güncellendi")
        ->with("alert_type","success");;
    }

}
