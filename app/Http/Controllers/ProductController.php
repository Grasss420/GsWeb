<?php

namespace Grassstation\Http\Controllers;

use Grassstation\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    function __construct() {
        $this->middleware('auth')->except(['show','json','jsonX']);
    }

    protected function redirectTo($request)
    {
        return route('menu');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //should be 301 but if user is authenticated it will fck up
        return Redirect::route('menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.edit',["editing"=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Product($request->input());
        if($request->has("editing_id")){
            $p = Product::find($request->input("editing_id"));
            $p->fill($request->input());
            $p->feature_flag = $request->has("feature_flag") ? 1 : 0;
        }
        $p->saveOrFail();
        Cache::forget('productU1');Cache::forget('productU2');Cache::forget( 'qHomeP');
        return Redirect::route("products.edit",$p->id)->with('updated', true); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \Grassstation\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if(!$product) abort(404);
        return view('products.show',["product"=>$product]);
    }
    public function toggleStock(Product $product) {
        $product->toggleStockStatus();
        return back()->with('success', 'Stock status updated successfully.'); // append #prdx-{{$product->id}}
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Grassstation\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',["editing"=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Grassstation\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        return abort(400);
    }

    public function picUpdate(Request $request, Product $product)
    {
        switch($request->input('action')){
            case "add-image":
                $product->toggleImage($request->input("value"));
                return back();
            case "set-featured":
                $product->setFeaturedPic($request->input("value"));
                return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Grassstation\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return Redirect::route("admin.menu");
    }

    public function json()
    {
        $r = Product::allVisibleJ();
        return response()->json($r);
    }

    public function jsonX(Request $request)
    {
        $rsp = [];
        /* welcum to da cool kids code clubz
        */
        $input = $request->input();
        $qs = $request->getQueryString();
        //calculate fCSH
        
    }
}
