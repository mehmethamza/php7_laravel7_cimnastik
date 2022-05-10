<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Workplaces;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Variable;

function replace_tr($text)
{
    $text = trim($text);
    $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
    $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
    $new_text = str_replace($search,$replace,$text);
    return $new_text;
}
function decodePropertiesArray($properties)
{
    if ($properties == "all") {
        return "all";
    }
    $decodedProperties = [];
    foreach ($properties as $key => $value) {
        $decodedProperties[$key] = decrypt($value);
    }
    return $decodedProperties;

}
function defaultAllData()
{
    $workplaces = Workplaces::with("workplaceImage") -> get();
    return $workplaces;
}
function filterSearch($search)
{
    if ($search == "all") {
        return defaultAllData();
    }
    else {
        $workplaces =  Workplaces::where("province",'like', '%' . replace_tr($search). '%')->orwhere("district",'like', '%' . replace_tr($search). '%') -> with("workplaceImage")-> orderby("status")->get();
        return $workplaces;
    }
}
function filterProduct($product)
{
    if ($product == "all") {
        return defaultAllData();
    }
    else {
        $product = decrypt($product);
        $workplaces =  Workplaces
        ::whereHas("workplaceProducts",function(Builder $query)use($product){
            $query -> where("product_id",$product);
        })
        ->with("workplaceImage")->get();
        return $workplaces;
    }
}
function filterProperties($properties)
{
    if ($properties == "all") {
        return defaultAllData();
    }
    else {
        $properties = decodePropertiesArray($properties);
        $workplaces = Workplaces::whereHas("workplaceProperties",function($query) use ($properties){
            return $query -> where ("property_id",$properties[0]);
        }) -> get();
        foreach ($properties as $key =>  $value) {
            if ($key != 0) {
                $workplaces_beta = Workplaces::whereHas("workplaceProperties",function($query) use ($value){
                    return $query -> where ("property_id",$value);
                }) -> get();
                $workplaces = $workplaces -> intersect($workplaces_beta);
            }
        }
        return $workplaces;
    }
}
function filterProperties2($properties)
{
    if ($properties == "all") {
        return defaultAllData();
    }
    else {
        $properties = decodePropertiesArray($properties);
        $workplaces = Workplaces::whereHas("workplaceProperties",function($query) use ($properties){
            foreach ($properties as $key => $value) {
                return $query -> where ("property_id",$value);
            }
        }) -> get();
        return $workplaces;
    }
}
function setArray($workplaces)
{
    $workplace_list = [];
        foreach ($workplaces as  $value) {
            $object =[
                "title" => $value -> title,
                "slug" => $value -> slug,
                "district" => $value -> district,
                "province" => $value -> province,
                "img_location" => $value -> workplaceImage -> location
            ];
            array_push($workplace_list,$object);
        }
    return $workplace_list;
}
class JqGetWorkplacesController extends Controller
{
    public function returnWorkplaces(Request $request)
    {
        $filteredSearch = filterSearch($request -> search);
        $filteredProduct = filterProduct($request -> product);
        $filteredProperties = filterProperties($request -> properties);
        $workplaces = $filteredSearch -> intersect($filteredProduct);
        $workplaces = $workplaces-> intersect($filteredProperties);
        $workplaces = $workplaces->sortBy("status");
        $workplace_list = setArray($workplaces);
        return response()->json(['success'=>'Ajax request submitted successfully',"workplaces" => $workplace_list]);
    }
}

















