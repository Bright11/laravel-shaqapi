<?php

namespace App\Http\Controllers\api;

use App\helper\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use HttpResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return ProductResource::collection(
            Product::all()
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $request->validated($request->all());
        $item=Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'qty'=>$request->qty,
            'unit_price'=>$request->unit_price,
            'amount'=>$request->amount
        ]);
        return new ProductResource($item);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $product=Product::find($id);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req,$id)
    {

        //updating item

        try {

        $update=Product::find($id);
        $update->name=$req->name;
        $update->description=$req->description;
        $update->qty=$req->qty;
        $update->unit_price=$req->unit_price;
        $update->amount=$req->amount;
        $update->update();
        return new ProductResource($update);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Update failed'], 500);
        }

        //  $product->update($req->all());
        //  return new ProductResource($product);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $product=Product::find($id)->delete();
    }

    // getting user items

    public function customeritem($id){
        // return Auth::user()->id;
        if(!Auth::user()){
            return $this->error('','Login or register in other to buy',401);
        }
            $now = Carbon::now();
       $checkitem=Product::find($id);
       if(!$checkitem) return 'no item';
      $checkcartitem=Cart::where("product_id",$id)->where("user_id",Auth::user()->id)->first();
    // $checkcartitem=Cart::where("product_id",$id)->where("user_id",$req->user_id)->first();

       if($checkcartitem){
        // checking if item is in cart already
        $checkcartitem->qty=$checkcartitem->qty+1;
        $checkcartitem->total=$checkcartitem->total+ $checkitem->amount;
        $checkcartitem->update();
        //return redirect()->back();
        return $this->success('','Item updated',200);
       }
       if(!$checkcartitem){
        // add fresh item into cart
        $cart=new Cart;
        $cart->user_id=Auth::user()->id;
        $cart->product_id=$checkitem->id;
        $cart->qty=1;
        $cart->total=$checkitem->amount;
        $cart->issued_date=$now->toDateString();
        $cart->expiring_date=$now->copy()->addDays(20);
        $cart->save();
        //return redirect()->back();
        return $this->success('','Item added',200);
       }

    }
}
