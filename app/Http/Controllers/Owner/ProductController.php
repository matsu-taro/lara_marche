<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Shop;
use App\Models\Owner;
use App\Models\Product;
use App\Models\PrimaryCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:owners');

    $this->middleware(function ($request, $next) {

      $id = $request->route()->parameter('product'); //文字列
      if (!is_null($id)) {
        $productsOwnerId = Product::findOrFail($id)->shop->owner->id;
        $productId = (int)$productsOwnerId; //文字列→数字に変換処理

        if ($productId !== Auth::id()) {
          abort(404);
        }
      }

      return $next($request);
    });
  }

  public function index()
  {
    // $products = Owner::findOrFail(Auth::id())->shop->product;
   
    $ownerInfo = Owner::with('shop.product.imageFirst')
      ->where('id', Auth::id())->get();

    return view('owner.products.index', compact('ownerInfo'));
  }

  
  public function create()
  {
     $shops = Shop::where('owner_id',Auth::id())
     ->select('id','name')
     ->get();

     $images = Image::where('owner_id',Auth::id())
     ->select('id','title','filename')
     ->orderBy('updated_at','desc')
     ->get();

    $categories = PrimaryCategory::with('secondary')
    ->get();

    return view('owner.products.create',compact('shops','images','categories'));
  }

  
  public function store(Request $request)
  {
    dd($request);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
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
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
