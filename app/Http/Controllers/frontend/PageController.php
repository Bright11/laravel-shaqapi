<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use App\helper\ApiClient;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{

    //
    protected $apiClient;

    public function __construct(ApiClient $apiClient){
        $this->apiClient =$apiClient;
    }


    public function index(){
      $item=Product::all();
        return view('frontend.index',['item'=>$item]);
    }

    public function invoice(){
        if(!Auth::user())return redirect()->route('login');
        if(Auth::user()){
            $myitem=Cart::where("user_id",Auth::user()->id)->get();
            $gettotal=Cart::where("user_id",Auth::user()->id)->sum('total');
        return view('frontend.invoice',['myitem'=>$myitem,'gettotal'=>$gettotal]);

        }
    }
    public function login(){
        return view('frontend.login');
    }



}
