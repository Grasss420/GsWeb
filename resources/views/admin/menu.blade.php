@extends('layouts.gs')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{route("home")}}" class="windows-button" style="">🏠</a>
                    &#10148; จัดการเมนูสินค้า
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <div class="col-sm-3">Filter By

                                    <button type="button" class="btn btn-block btn-outline-primary">Select All</button>
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck1" name="filterByType[]" value="sativa">
                                        <label class="form-check-label" for="gridCheck1">
                                            Sativa
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck2" name="filterByType[]" value="indica">
                                        <label class="form-check-label" for="gridCheck2">
                                            Indica
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck3" name="filterByType[]" value="hybrid">
                                        <label class="form-check-label" for="gridCheck3">
                                            Hybrid
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck4" name="filterByType[]" value="acc">
                                        <label class="form-check-label" for="gridCheck4">
                                            Accessories
                                        </label>
                                    </div>
                                    <hr>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck5" name="filterByStatus[]" value="instock">
                                        <label class="form-check-label" for="gridCheck5">
                                            In Stock
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck6" name="filterByStatus[]" value="out of stock">
                                        <label class="form-check-label" for="gridCheck6">
                                            Out of Stock
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input mta" type="checkbox" id="gridCheck7" name="filterByStatus[]" value="hidden">
                                        <label class="form-check-label" for="gridCheck7">
                                            Hidden
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                            <a href="{{route("products.create")}}" class="btn btn-primary">Add New Product</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>รหัสสต๊อค</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ราคา</th>
                                        <th>Commands</th>
                                    </tr>
                                </thead>
                                {{-- todo:make it more display enduser friendly --}}
                                <tbody>
                                    @foreach (\Grassstation\Models\Product::query()->orderBy("internal_sku")->get() as $product)
                                    <tr class="table-{{$product->stockStatusClass()}}">
                                        <td><a href="{{route("products.edit",$product->id)}}">{{$product->internal_sku}}</td>
                                        <td>{{$product->name}} {!! $product->dispKind(true) !!} {!! $product->feature_flag ? '<span>⭐</span>' : '' !!}</td>
                                        <td class="text-right">{{$product->price_per_gram}}</td>
                                        <td class="commands">
                                            <div class="btn-group">
                                            <a class="btn btn-sm disabled" href="#" role="button" title="รูปภาพสินค้า"><img src="{{asset("img/win95/icons/imagjpeg-0.png")}}" alt="" class="icon-16"> {{$product->imagesCount()}}</a>
                                            
<form action="{{ route('products.toggle-stock', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit">ปรับสถานะสินค้า</button>
</form></div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('xtrajs')
    <script>
        const msource = "{{route("products.json")}}";
    </script>
    <script src="{{asset("js/adminmenu.js")}}"></script>
@endsection