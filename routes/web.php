<?php

use App\Http\Controllers\AddListeningController;
use App\Http\Controllers\AddListingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\EditListingController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JqGetWorkplacesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\WorkplaceListingController;
use App\Http\Controllers\WorkplacesCommentsController;
use App\Http\Controllers\WorkplacesController;
use App\Http\Controllers\WorkplacesMessagesController;
use App\Http\Controllers\WorkplacesNewsController;
use App\Models\Products;
use App\Models\Properties;
use App\Models\Provinces;
use Illuminate\Support\Facades\Route;
use App\Models\Workplaces;
use App\Models\WorkplacesComments;
use App\Models\WorkplacesMessages;
use App\Models\WorkplacesNews;
use App\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;

use function App\Http\Controllers\getProducts;
use function App\Http\Controllers\getProperties;
use function App\Http\Controllers\getProvinces;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,"show"]) -> name("home");


Route::get('/dashboard', function () {
    return view('panel.dashboard.dashboard');
});

Route::get('/workplace/{slug?}', [WorkplacesController::class,"show"]) -> name("workplace");
Route::post("/workplace/store/message",[WorkplacesMessagesController::class,"store"])->name("workplace.store.message");

Route::name("dashboard.")->prefix("/dashboard")->group(function(){
    Route::middleware("seller")->group(function(){
        Route::get("/",[WorkplaceListingController::class,"show"])->name("index");
        // Route::get("/",[DashboardController::class,"index"])->name("index");
        Route::get("/add_listing",[AddListingController::class,"index"])->name("add_listing");
        Route::get("/listing/workplace",[WorkplaceListingController::class,"show"])->name("listing.workplace");
        Route::get("/edit_listing/{slug}",[EditListingController::class,"show"])->name("edit_listing");
        Route::name("profile.")->prefix("/profile")->group(function(){
            Route::get("/",[ProfileController::class,"show"])->name("show");
            Route::prefix("/update")->name("update.")->group(function(){
                Route::post("/details",[ProfileController::class,"updateDetails"])->name("details");
                Route::post("/password",[ProfileController::class,"updateAccountPassword"])->name("password");
            });
        });
        Route::name("workplace.")->group(function ()
        {
            Route::post("/workplace/store",[WorkplacesController::class,"store"]) -> name("store");
            Route::post("/workplace/edit",[WorkplacesController::class,"edit"]) -> name("edit");
            Route::post("/workplace/payment",[PaymentController::class,"createPaymentForm"]) -> name("payment");
        });
        Route::prefix("/messages")->group(function(){
            Route::get("/",[WorkplacesMessagesController::class,"index"])->name("messages");
            Route::post("/reply",[WorkplacesMessagesController::class,"replyMessage"])->name("message.reply");
        });
        Route::prefix("/news")->name("news.")->group(function(){
            Route::get("/listing/{workplace_slug}",[WorkplacesNewsController::class,"listing"])->name("listing");
            Route::post("edit/page",[WorkplacesNewsController::class,"editPage"])->name("edit.page");
            Route::post("store/page",[WorkplacesNewsController::class,"storePage"])->name("store.page");
            Route::post("store",[WorkplacesNewsController::class,"store"])->name("store");
        });

        Route::get("/districts/{id?}",[DistrictsController::class,"sendDistricts"]) -> name("sendDistricts");
    });
    Route::prefix("/comments")->name("comments.")->group(function(){
        Route::post("/store",[WorkplacesCommentsController::class,"store"])->name("store");
    });
    Route::get("/redirect/payment/page",function(){
        return redirect()->route("dashboard.listing.workplace")
            ->with("alert"," iş yeriniz için ödeme yapmalısınız")
            ->with("alert_type","error");
    })->name("redirect.payment");

});
Route::match(['get', 'post'],"/receive/payment/{workplace_id}",[PaymentController::class,"receivePaymentForm"])->name("receive");
Route::name("user.")->prefix("/user")->group(function(){
    Route::post("/store",[UserAccountController::class,"store"]) -> name("store");
    Route::post("/login",[UserAccountController::class,"login"]) -> name("login");
    Route::get("/logout",[UserAccountController::class,"logout"]) -> name("logout");
});

Route::name("jq.")->prefix("/jq")->group(function(){
    Route::get("/workplaces",[JqGetWorkplacesController::class ,"returnWorkplaces"])->name("workplaces");
    Route::get("/products",[JqGetWorkplacesController::class ,"returnProducts"])->name("products");
});


Route::get("/deneme2",function ()
{
    function replace_tr($text)
    {
        $text = trim($text);
        $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
        $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
        $new_text = str_replace($search,$replace,$text);
        return $new_text;
    }
    $search = "all";
    $product = "all";
    $properties = [2];
    $workplaces = Workplaces
    ::where(function($query) use($search){
        if ($search == "all") {
            $query -> where("id",">",0);
        }
        else
        {
            $query ->  where("province",'like', '%' . replace_tr($search). '%')->orwhere("district",'like', '%' . replace_tr($search). '%');
        }
    })
    -> whereHas("workplaceProducts",function($query)use($product){
        if ($product == "all") {
            $query -> where("id",">",0);
        }
        else
        {
            $query -> where("product_id",$product);
        }
    })
    -> whereHas("workplaceProperties",function($query)use($properties){
        if ($properties == "all") {
            $query -> where("id",">",0);
        }
        else
        {
            foreach ($properties as $key => $value) {
               return $query -> where ("property_id",$value);
            }

        }
    })
    -> get();
    return $workplaces ;
});

Route::get("/deneme3",function(FileController $file){
   $a = $file->deleteImage("../public/uploads/sports/IejNOlHSfcgM1CBeypNLsI1Nil4hZo7o9ItS0cB7images.jpg");
   return $a;
});

Route::get("/deneme4",function(){
    $workplaces = Workplaces::all();
    $workplaces = $workplaces ->filter(function ($value, $key) {
        $value = $value -> workplaceProperties;
        $value -> filter(function($value,$key){
            return $value -> where("property_id",1);
        });
    });
    return dd($workplaces);
});

Route::get("/deneme5",function(){
    $workplace = Workplaces::find(4);
    $news = $workplace->workplaceNews;
    return view("dashboard.workplace_news.news_listing.index",compact("news"));
});
// Route::post("/deneme6",[WorkplacesNewsController::class,"store"])->name("workplace.news.store");
Route::post("/deneme6",[WorkplacesNewsController::class,"edit"])->name("workplace.news.edit");
Route::get("/deneme7",function(){
    $news = WorkplacesNews::find(1);
    return $news->getWorkplace->slug;
});

