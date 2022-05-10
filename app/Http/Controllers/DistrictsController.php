<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use Illuminate\Http\Request;

class DistrictsController extends Controller
{
    public function sendDistricts($id){
        $districts = Districts::where("province_id",$id) -> get();
        return response()->json(['success'=>'Ajax request submitted successfully',"districts" => $districts]);
    }
}
