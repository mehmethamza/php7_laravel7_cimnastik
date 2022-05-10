<?php

namespace App\Http\Controllers;

use App\Http\Controllers\FileController;
use App\Models\Properties;
use App\Models\Workplaces;
use App\Models\WorkplacesDetails;
use App\Models\WorkplacesImages;
use App\Models\WorkplacesProducts;
use App\Models\WorkplacesProperties;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator as ValidationValidator;
use Ramsey\Uuid\Rfc4122\Validator as Rfc4122Validator;


function getWorkplace($slug)
{
    return Workplaces::where("slug",$slug)->first();
}
class WorkplacesController extends Controller
{
    public function store(Request $request,FileController $file)
    {
        $validated = $request->validate([
            "images"    => "required|array",
            "images.*"  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048' ,
        ]);
        // -- -- here we have recorded the general information
        $workplace = new Workplaces();
        $workplace -> title =  $request -> title;
        $workplace -> slug = Str::slug($request -> title).random_int(9999,999999) ;
        $workplace -> province = $request -> province;
        $workplace -> district = $request -> district;
        $workplace -> full_adress = $request -> address;
        $workplace -> zip = $request -> zip;
        $workplace -> user_id = auth()->user()->id;
        $workplace -> country = "Turkey";
        $workplace -> location = $request -> location;
        $workplace -> tax_number = $request -> tax_number;
        $workplace -> status = "waiting";
        // $workplace -> click_rate = "0";
        // $workplace -> notice = "";
        $workplace -> save();
        // -- -- here we have recorded the details information
        $details = new WorkplacesDetails();
        $details -> workplace_id = $workplace -> id;
        $details -> content = $request -> description ;
        $details -> phone = $request -> phone;
        $details -> web = $request -> web;
        $details -> email = $request -> email;
        $details -> facebook = $request -> facebook;
        $details -> twitter = $request -> twitter;
        $details -> save();
        // -- -- here we have recorded the properties information
        foreach ($request -> properties as $property) {
            $properties = new WorkplacesProperties();
            $properties -> workplace_id = $workplace -> id;
            $properties -> property_id = decrypt($property);
            $properties -> save();
        }
        // -- -- here we have recorded the products information
        foreach ($request -> products as $key => $product) {
            $products = new WorkplacesProducts();
            $products -> workplace_id = $workplace -> id;
            $products -> product_id = decrypt($product);
            $products -> price	= $request -> products_price[$key];
            $products -> save();
        }
        // -- -- here we have recorded the image information
        foreach ( $request -> images  as  $image) {
            $image_name = Str::random(40). $image ->getClientOriginalName();
            $move_name = "/uploads/sports/".$image_name;
            $image -> move("uploads/sports",$image_name);
            $image = new WorkplacesImages();
            $image -> workplace_id = $workplace -> id;
            $image -> location = $move_name;
            $image -> save();
        }
        return redirect()->route("dashboard.listing.workplace")->with("alert","".$workplace->title.""." iş yeriniz başarıyla eklendi")
        ->with("alert_type","success");
    }
    public function edit(Request $request,FileController $file)
    {
        // -- -- here we have edit the general information
        $workplace = Workplaces::find(decrypt($request->workplace_id));
        $workplace -> title =  $request -> title;
        $workplace -> province = $request -> province;
        $workplace -> district = $request -> district;
        $workplace -> full_adress = $request -> address;
        $workplace -> zip = $request -> zip;
        $workplace -> location = $request -> location;
        $workplace -> notice = $request -> notice;
        $workplace -> youtube_embed = $request -> youtube_embed;
        $workplace -> save();
        // -- -- here we have edit the details information
        $details = $workplace->details;
        $details -> workplace_id = $workplace -> id;
        $details -> content = $request -> description ;
        $details -> phone = $request -> phone;
        $details -> web = $request -> web;
        $details -> email = $request -> email;
        $details -> facebook = $request -> facebook;
        $details -> twitter = $request -> twitter;
        $details -> twitter = $request -> twitter;
        $details -> save();
        // -- -- here we have edit the properties information
        WorkplacesProperties::where("workplace_id",$workplace->id)->delete();
        if ($request->properties != null) {
            foreach ($request -> properties as $property) {
                $properties = new WorkplacesProperties();
                $properties -> workplace_id = $workplace -> id;
                $properties -> property_id = decrypt($property);
                $properties -> save();
            }
        }
        // -- -- here we have edit the products information
        if ($request -> products != null) {
            WorkplacesProducts::where("workplace_id",$workplace->id)->delete();
            foreach ($request -> products as $key => $wproduct) {
                $product = new WorkplacesProducts();
                $product -> workplace_id = $workplace->id;
                $product -> product_id = decrypt($wproduct);
                $product -> price	= $request -> products_price[$key];
                $product -> save();
            }
        }
        // -- -- here we have delete the image end information
        if ($request->deletingimages != null) {
            foreach ($request->deletingimages as $key => $image) {
                $image = decrypt($image);
                WorkplacesImages::where("location",$image)->delete();
                $file->deleteImage($image);
            }
        }
        //than we save new image
        // -- -- here we have recorded the image information
        if ($request -> images != null) {
            foreach ( $request -> images  as  $image) {
                $image_name = Str::random(40). $image ->getClientOriginalName();
                $move_name = "/uploads/sports/".$image_name;
                $image -> move("uploads/sports",$image_name);
                $image = new WorkplacesImages();
                $image -> workplace_id = $workplace -> id;
                $image -> location = $move_name;
                $image -> save();
            }
        }
        return redirect()->route("dashboard.listing.workplace")
        ->with("alert","".$workplace->title.""." iş yeriniz başarıyla güncellendi")
        ->with("alert_type","success");
    }
    public function show($slug)
    {
        $workplace = getWorkplace($slug);
        $workplace->click_rate = intval($workplace->click_rate)+1;
        $workplace->save();
        $comments = $workplace->workplaceComments->where("type","customer");
        $average_rating_service = $comments->avg("rating_service");
        $average_rating_communacatione = $comments->avg("rating_communacation");
        $average_rating_advice = $comments->avg("rating_advice");
        $average_rating_average = $comments->avg("rating_average");
        $seller = $workplace -> workplaceSeller;
        $isSellerWorkplace = auth()->check() && auth()->user()->id == $seller ->id;
        return view("workplace.index",compact("workplace","comments","average_rating_service","average_rating_communacatione","average_rating_advice","average_rating_average","seller","isSellerWorkplace"));
    }
}
