@extends('layouts.gs')

@section('title') Grassstation คลองสี่ : Menu @endsection

@section('head')
<meta name="description" content="เมนูร้านขายกัญชา Grassstation">
<meta name="keywords" content="เมนูร้านขายกัญชา,เมนูกัญชา"/>
<!-- Facebook Meta Tags -->
<meta name="og:title" content="เมนูร้านขายกัญชา Grassstation">
<meta name="og:description" content="กัญชา Grassstation ราคาเริ่มต้นที่ 20 บาท สามารถดูได้ที่นี่"/>
<meta name="og:site_name" content="Grassstation.XYZ">
<meta name="og:type" content="website">
<meta name="og:url" content="https://grassstation.xyz/menu">
<meta name="og:image" content="{{asset('img/gsimg/gsMenu_ss.png')}}">
<meta property="og:locale" content="th_TH" />
<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="grassstation.xyz">
<meta property="twitter:url" content="https://grassstation.xyz/menu">
<meta name="twitter:title" content="เมนูร้านขายกัญชา Grassstation">
<meta name="twitter:description" content="กัญชา Grassstation ราคาเริ่มต้นที่ 20 บาท สามารถดูได้ที่นี่">
<meta name="twitter:image" content="{{asset('img/gsimg/gsMenu_ss.png')}}">
<meta name="twitter:site" content="@GrassstationXYZ">
<link rel="canonical" href="https://grassstation.xyz/menu">
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ItemList",
        "name": "Grassstation Menu",
      "url": "https://grassstation.xyz/",
      "logo": "https://grassstation.xyz/img/gs.png",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+66-987-999-420",
        "contactType": "customer service"
      }
    }
</script>
@endsection

@section('content')
    <div class="container" id="gs-menu">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        เมนู
                    </div>
                    <div class="card-body menu-category">
                        <div class="list-group">
                            <a href="#featured" class="list-group-item list-group-item-action active mc-featured">
                                เมนูแนะนำ
                            </a>
                            <label id="mcSativa" for="cSativa" class="list-group-item list-group-item-action mc-sativa">Sativa <small class="hidden-xs">(สำหรับใช้กลางวัน)</small></label>
                            <label id="mcIndica" for="cIndica" class="list-group-item list-group-item-action mc-indica">Indica <small class="hidden-xs">(สำหรับใช้กลางคืน)</small></label>
                            <label id="mcHybrid" for="cHybrid" class="list-group-item list-group-item-action mc-hybrid">Hybrid <small class="hidden-xs">(สายพันธ์ผสม)</small></label>
                            <label id="mcAcc" for="cAcc" class="list-group-item list-group-item-action mc-acc">Accessories  <small class="hidden-xs">(อุปกรณ์ต่างๆ)</small></label>
                        </div>
                    </div>
                    
                </div>
                <br>
                <div class="card d-none d-sm-block" id="card-featured">
                    <div class="card-header">สินค้าโปรโมชั่น</div>
                    <div class="card body"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route("root")}}">Grassstation</a> &raquo; Menu
                        
                    </div>
                    <div class="card-body" id="menu-main">
@php
    $targetDate = \Carbon\Carbon::create(2024, 3, 15); // Set your target date
@endphp

                        <h1 class="" style="font-size: 24pt">
@if(\Carbon\Carbon::now()->lte($targetDate))
<marquee>🔥🔥!!Promotion รับต้นเดือน!!🔥🔥
⭐️ซื้อ 2 แถม 1 ทุกรายการ🥴⭐️</marquee>
@else เมนู Grassstation @endif
                        </h1>
                        <div>
                            <script async src="https://cse.google.com/cse.js?cx=6643f1053948341d4">
                            </script>
                            <div class="gcse-search"></div>
                        </div>
                        <form class="form-inline justify-content-between d-none" method="POST" action="#" id="frmSearch">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><label for="search">ค้นหาสินค้า</label></span>
                            </div>
                        
                            <input id="search" name="search" type="text" class="form-control" placeholder="ชื่อสายพันธ์, กลิ่น, Effects, Etc." aria-label="Search Product">
                            <div class="input-group-append">
                                
                                <label class="sr-only" for="inputGroupSelect00">ราคาเริ่มต้นที</label>
                            <select class="custom-select" id="inputGroupSelect00" name="min">
                                <option value="0" selected>(ราคาเริ่มต้นที)</option>
                                <option value="50">50 ฿</option>
                                <option value="100">100 ฿</option>
                                <option value="150">150 ฿</option>
                                <option value="200">200 ฿</option>
                                <option value="250">250 ฿</option>
                                <option value="300">300 ฿</option>
                            </select>

                            <label class="input-group-text" for="inputGroupSelect01">–<span class="sr-only">ราคาไม่เกิน</span></label>
                            <select class="custom-select" id="inputGroupSelect01" name="max">
                                <option value="-1" selected>(ราคาไม่เกิน)</option>
                                <option value="50">50 ฿</option>
                                <option value="100">100 ฿</option>
                                <option value="150">150 ฿</option>
                                <option value="200">200 ฿</option>
                                <option value="250">250 ฿</option>
                                <option value="300">300 ฿</option>
                                <option value=400">400 ฿</option>
                                <option value="500">500 ฿</option>
                            </select>

                            <button class="btn btn-outline-secondary" type="button" id="button-search">Search</button>
                            <button class="btn btn-danger" style="display: none" type="reset" id="button-reset" title="Reset Search">&nbsp; &times; &nbsp;<div class="sr-only">Reset Search</div></button>
                            </div>
                        </div>
                        
                        <div class="pull-right" id="toggle-view">
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-info btn-sm active">
                                    <input class="tv" type="radio" name="view" value="thumb" id="vT" autocomplete="off" checked> <img src="{{asset("img/win95/icons/file_program_group-1.png")}}" alt="Thumb View" class="icon-16">
                                </label>
                                <label class="btn btn-info btn-sm">
                                    <input class="tv" type="radio" name="view" value="list" id="vL" autocomplete="off"> <img src="{{asset("img/win95/icons/file_lines-1.png")}}" alt="List View" class="icon-16">
                                </label>
                            </div>
                        </div>
                        <div class="form-group d-none">
                            <label class="sr-only" for="inputName">Select Strain</label>
                            <input class="mta" type="checkbox" name="kind[]" value="sativa"  id="cSativa" aria-labelledby="mcSativa">
                            <input class="mta" type="checkbox" name="kind[]" value="indica"  id="cIndica" aria-labelledby="mcIndica">
                            <input class="mta" type="checkbox" name="kind[]" value="hybrid"  id="cHybrid" aria-labelledby="mcHybrid">
                            <input class="mta" type="checkbox" name="kind[]" value="null"  id="cAcc" aria-labelledby="mcAcc">
                        </div>
                        </form>
                        {{-- Tab List --}}
                        <ul class="nav nav-tabs" id="menuTabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">เมนูแนะนำ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="u2-tab" data-toggle="tab" href="#under200" role="tab" aria-controls="under200" aria-selected="false">≤ 200฿/g</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="u1-tab" data-toggle="tab" href="#under100" role="tab" aria-controls="under100" aria-selected="false">≤ 100฿/g</a>
                            </li>
                            <li class="nav-item d-none" id="dserch">
                                <a class="nav-link" id="sr-tab" data-toggle="tab" href="#sr" role="tab" aria-controls="sr" aria-selected="false">ผลการค้นหา</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="menuTabContent">
                            <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="u1-tab">
                                @php
                            //get featured menu
                            $fp = \Grassstation\Models\Product::Featured()->OrderByDesc("price_per_gram")->OrderBy("internal_sku")->get();
                        @endphp
                        @if($fp->count() === 0)
                            <p class="text-center">ยังไม่มีสินค้าแนะนำในขณะนี้ สามารถเลือกชมสินค้าได้จากเมนูด้านข้าง</p>
                        @else
                        <div class="row">
                            @foreach ($fp as $i=>$product)
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <img class="card-img-top" {{$i > 5 ? 'loading="lazy"' : ""}} src="{{$product->firstImage()}}" alt="Product Image for {{$product->name}}">
                                    <div class="card-body">
                                    <h4 class="card-title"><a href="{{route("products.show",$product->id)}}">{{$product->name}}</a></h4>
                                    <p class="card-text">
                                        <div>
                                            {!! $product->dispKind() !!}
                                        </div>
                                        <span class="product-price">{{$product->displayPrice(true)}}</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                            </div>
                            <div class="tab-pane fade" id="under100" role="tabpanel" aria-labelledby="u2-tab">
                                <p class="lead text-center">สินค้าราคาไม่เกิน 100฿ ต่อกรัม</p>
                                @php
                                    $p1 = \Grassstation\Models\Product::getU1();
                                @endphp
                                <div class="row">
                                @foreach ($p1 as $product)
                                <div class="col-md-4 col-sm-6">
                                    <div class="card">
                                        <img class="card-img-top" loading="lazy" src="{{$product->firstImage()}}" alt="Product Image for {{$product->name}}">
                                        <div class="card-body">
                                        <h4 class="card-title"><a href="{{route("products.show",$product->id)}}">{{$product->name}}</a></h4>
                                        <p class="card-text">
                                            <div>
                                            {!! $product->dispKind() !!}
                                            </div>
                                            <span class="product-price">{{$product->displayPrice(true)}}</span>
                                        </p>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="under200" role="tabpanel" aria-labelledby="u1-tab">
                                <p class="lead text-center">สินค้าราคาไม่เกิน 200฿ ต่อกรัม</p>@php
                                $p1 = \Grassstation\Models\Product::getU2();
                            @endphp
                            <div class="row">
                            @foreach ($p1 as $product)
                            <div class="col-md-4 col-sm-6">
                                <div class="card">
                                    <img class="card-img-top" loading="lazy" src="{{$product->firstImage()}}" alt="Product Image for {{$product->name}}">
                                    <div class="card-body">
                                    <h4 class="card-title"><a href="{{route("products.show",$product->id)}}">{{$product->name}}</a></h4>
                                    <p class="card-text">
                                        <div>
                                            {!! $product->dispKind() !!}
                                        </div>
                                        <span class="product-price">{{$product->displayPrice(true)}}</span>
                                    </p>
                                  </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            </div>
                            <div class="tab-pane fade" id="sr" role="tabpanel" aria-labelledby="sr-tab">
                                <p class="lead text-center"><br>กำลังค้นหาสินค้า...<br>&nbsp;</p>
                            </div>
                          </div>
                        
                    </div>
                    <div class="card-footer sr-only">
                        <a name="" class="btn btn-success btn-sm" href="{{route('k4.menu')}}" role="button">ดูข้อมูลสินค้า</a>
                        เมนูกัญชา กัญชาปทุมธานี ราคาเริ่มต้นที 20 บาท, กัญชาคลองสี่ กัญชาลำลูกกา Grassstation, ร้านกัญชาใกล้ฉัน จังหวัดปทุมธานี<br>
                        เมนูกัญชา Indoor, กัญชา Green Crack, กัญชา Blue Dream, กัญชาเคดี, กัญชา KD, ส่งด่วนกัญชา กัญชาส่งด่วน กัญชาส่งแกร็บ ส่งฟรีในบริเวณคลอง 1-6
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
    <script src="{{asset("js/grasssmenu.js")}}"></script>

@endsection