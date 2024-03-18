<?php

namespace Grassstation\Http\Controllers;

use Grassstation\Models\ProductPic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductPicController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pics = ProductPic::orderByDesc("id");
        return view('pics.list',['pics'=>$pics->simplePaginate('30')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pics.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 'store' method in ProductPicController
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:20480', // Max file size: 2MB
        ]);

        $file = $request->file('file');

        // Save the file to storage or database, depending on your needs
        $path = $file->store('public/gsi');

        $isf = ProductPic::storeFile($path);

        return response()->json(['success' => 'File uploaded successfully','path'=>$path]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \Grassstation\Models\ProductPic  $productPic
     * @return \Illuminate\Http\Response
     */
    public function show(ProductPic $productPic)
    {
        return response()->redirectTo($productPic->getURL());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Grassstation\Models\ProductPic  $productPic
     * @return \Illuminate\Http\Response
     */
    public function edit($ppid)
    {
        $productPic = ProductPic::findOrFail($ppid);
        return response()->json([
            "id"=>$productPic->id,
            "url"=>$productPic->url,
            "description"=>$productPic->description,
            "url2"=>$productPic->getURL(),
            "del"=>route("pics.destroy",$productPic->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Grassstation\Models\ProductPic  $productPic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductPic $productPic)
    {
        //
    }

    public function modify(Request $request)
    {
        //dd($request->input());
        $q = $request->input("editing_id");
        $pp = ProductPic::findOrFail($q);
        $pp->fill($request->only(["url","description"]));
        $pp->saveOrFail();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Grassstation\Models\ProductPic  $productPic
     * @return \Illuminate\Http\Response
     */
    public function destroy($ppid)
    {
        //
        $productPic = ProductPic::findOrFail($ppid);
        $productPic->delete();
        return redirect()->route("pics.index");
    }
}
