<?php

namespace App\Http\Controllers;

use App\Models\Districts;
use App\Models\Products;
use App\Models\Properties;
use App\Models\Provinces;
use Illuminate\Http\Request;

function getProvinces()
{
    return Provinces::all();
}
function getProducts()
{
    return Products::all();
}
function getProperties()
{
    return Properties::all();
}

class AddListingController extends Controller
{
    public function index()
    {
        $provinces = getProvinces();
        $products = getProducts();
        $properties = getProperties();
        //  return ($citys[0]["Sehir-Bilgileri"]["plaka"]);
        return view("dashboard.add_listing.index",compact("provinces","products","properties"));
    }
}
