<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkplaceListingController extends Controller
{
    public function show(Request $request)
    {
        $workplaces = auth()->user()->userWorkplaces;
        return view("dashboard.workplace_listing.index",compact("workplaces"));
    }
}
