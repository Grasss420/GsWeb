<?php

namespace Grassstation\Http\Controllers;

use Grassstation\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
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
    public function store(Request $request){
        try {
            $p = new Product($request->input());

            if ($request->has("editing_id")) {
                $p = Product::find($request->input("editing_id"));
                $p->fill($request->input());
                $p->feature_flag = $request->has("feature_flag") ? 1 : 0;
            }

            // Save product to the database
            $p->saveOrFail();

            // Clear the cache for related data
            Cache::forget('productU1');
            Cache::forget('productU2');
            Cache::forget('qHomeP');

            // Redirect back to the edit page with a success message
            return Redirect::route("products.edit", $p->id)->with('updated', true);

        } catch (QueryException $e) {
            // Check if the error is related to duplicate entry
            if ($e->getCode() == '23000') {
                // Redirect back with a custom error message
                return Redirect::back()->withErrors(['error' => 'Duplicate SKU: The internal SKU already exists for another product. Please choose a unique SKU.'])->withInput();
            }

            // For any other database error, return a generic message
            return Redirect::back()->withErrors(['error' => 'บันทึกข้อมูลไม่สำเร็จ กรุณาตรวจสอบรหัสสินค้าหรือการซ้ำกันของข้อมูล'.PHP_EOL.$e->getCode().PHP_EOL.$e->getMessage()])->withInput();
        } catch (\Exception $e) {
            // Handle general exceptions
            return Redirect::back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.'])->withInput();
        }
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
        return back()->with('success', 'Stock status updated successfully.')->withFragment('#prdx-'.$product->id); // append #prdx-{{$product->id}}
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
