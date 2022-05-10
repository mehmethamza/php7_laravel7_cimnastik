<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Properties;
use App\Models\Workplaces;
use Illuminate\Http\Request;

use function App\Http\Controllers\getProducts as ControllersGetProducts;

function getWorkplaces()
{
    return Workplaces:: all();
}
function getProducts()
{
    return Products::all();
}
function getProperties()
{
    return Properties::all();
}
function getPopulerWorkplaces()
{
    $workplaces = Workplaces::where("status","payed")->orderBy("click_rate","desc")->limit(6)->get();
    return $workplaces;
}
class HomeController extends Controller
{
    public function show()
    {
        $workplaces = getWorkplaces();
        $products = getProducts();
        $properties = getProperties();
        $populerWorkplaces = getPopulerWorkplaces();
        // return $workplaces[3] -> workplaceImage -> location;
        return view("home.index",compact("workplaces","products","properties","populerWorkplaces"));
    }
}
