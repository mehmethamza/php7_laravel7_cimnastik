<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Properties;
use App\Models\Provinces;
use App\Models\Workplaces;
use Illuminate\Http\Request;



class EditListingController extends Controller
{
    public function verifyWorkplaceSeller($workplace)
    {
        if (auth()->check()&& $workplace->user_id == auth()->user()->id) {
            return true;
        }
        else {
            return false;
        }
    }
    public function verifyWorkplacePaying($workplace)
    {
        if ($workplace->status != "payed") {
            return redirect()->route("dashboard.listing.workplace")
            ->with("alert","".$workplace->title.""." iş yeriniz için ödeme yapmalısınız")
            ->with("alert_type","error");
        }
        else {
            return false;
        }
    }
    public function show(Request $request,$slug)
    {
        $workplace = Workplaces::where("slug",$slug)->first();
        // return $this->verifyWorkplaceSeller($workplace);
        // return auth()->user()->id == $workplace->user_id;
        if (!$this -> verifyWorkplaceSeller($workplace)) {
            return back();
        }
        if ($this->verifyWorkplacePaying($workplace) != false) {
            return $this->verifyWorkplacePaying($workplace);
        }

        $provinces = Provinces::all();
        $products = Products::all();
        $properties = Properties::all();
        return view("dashboard.edit_listing.index",compact("workplace","provinces","products","properties"));
    }
}
