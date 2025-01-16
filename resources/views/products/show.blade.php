@extends('layouts.gs')

@php
    $cannonicalURL = "https://grassstation.xyz/products/".$product->id;
    $descriptionShort = substr(strip_tags($product->description),0,160);
@endphp

@section('title')สินค้ากัญชา {{$product->name}} @ Grassstation คลองสี่ @endsection

@section('head')
<meta name="description" content="{{$descriptionShort}}">
<!-- Facebook Meta Tags -->
<meta name="og:title" content="{{$product->name}} | Grassstation คลองสี่">
<meta name="og:description" content="{{$product->displayPrice()}} {{$descriptionShort}}"/>
<meta name="og:site_name" content="Grassstation.XYZ">
<meta name="og:type" content="product">
<meta name="og:url" content="{{url($cannonicalURL)}}">
<meta name="og:image" content="{{$product->firstImage()}}">
<meta property="og:locale" content="th_TH" />
<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:domain" content="grassstation.xyz">
<meta property="twitter:url" content="{{url($cannonicalURL)}}">
<meta name="twitter:title" content="{{$product->name}} | Grassstation คลองสี่">
<meta name="twitter:description" content="{{$product->displayPrice()}} {{$descriptionShort}}">
<meta name="twitter:image" content="{{$product->firstImage()}}">
<meta name="twitter:site" content="@GrassstationXYZ">
<link rel="canonical" href="{{url($cannonicalURL)}}">
<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
<meta name ="rating" content="adult"> 
<script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Product",
      "name": "{{$product->name}}",
      "description": "{!! $product->description !!}",
      "image": "{{$product->firstImage()}}",
      "sku": "885420{{crc32($product->internal_sku)}}",
      "brand": {
        "@type": "Brand",
        "name": "Grassstation"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{url($cannonicalURL)}}",
        "priceCurrency": "THB",
        "price": "{{$product->price_per_gram}}",
        "itemCondition": "https://schema.org/NewCondition",
        "availability": "{{$product->status === 'in stock' ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock'}}",
        "priceSpecification": {
          "@type": "PriceSpecification",
          "priceCurrency": "THB",
          "price": "{{$product->price_per_gram}}",
          "valueAddedTaxIncluded": true
        },
        "shippingDetails": {
          "@type": "OfferShippingDetails",
          "shippingRate": {
            "@type": "MonetaryAmount",
            "minValue": 15,
            "maxValue": 80,
            "currency": "THB"
          },
          "shippingDestination": {
            "@type": "DefinedRegion",
            "addressCountry": "TH"
          },
          "deliveryTime": {
            "@type": "ShippingDeliveryTime",
            "transitTime": {
              "@type": "QuantitativeValue",
              "minValue": 1,
              "maxValue": 7,
              "unitCode": "DAY"
            }
          }
        }
      }
    }
    </script>
@endsection

@section('content')
{{--  @include('components.ld.product',["product"=>$product]) --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    G:\S\Menu\{{$product->internal_sku}} ({{$product->getGrade()}})
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <nav class="breadcrumb col">
                                <a class="breadcrumb-item" href="{{route("menu")}}">Menu</a>
                                <span class="breadcrumb-item">{{ $product->getKind() }}</span>
                                <span class="breadcrumb-item active">{{ $product->name }}</span>
                            </nav>
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div id="pdSS" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @if ($product->hasImage())
                                    @php
                                        $in = 0;
                                        $proPics = [];
                                    @endphp
                                        @foreach ($product->product_images as $i => $imgid)
                                        @php
                                            $pic = \Grassstation\Models\ProductPic::find($imgid);
                                            if(!$pic){
                                                continue;
                                            }
                                            $proPics[$in] = $pic;
                                            
                                        @endphp
                                        <li data-target="#pdSS" data-slide-to="{{$in}}"{!! $in == 0 ? ' class="active"' : "" !!}></li>
                                        @php
                                            $in++;
                                        @endphp
                                    @endforeach
                                    @else
                                    <li data-target="#pdSS" data-slide-to="0" class="active empty" data-empty="true"></li>
                                    @endif
                                </ol>
                                <div class="carousel-inner" role="listbox" id="gs-slideshow">
                                    @if ($product->hasImage())
                                    @foreach ($proPics as $in => $pic)
                                        <div class="carousel-item {{$in == 0 ? 'active' : ""}}">
                                            <div class="img-item" oncontextmenu="return false" style="background-image:url('{{$pic->getURL()}}')"><img class="d-none" loading="lazy" src="{{$pic->getURL()}}" alt="Product Image #{{$in+1}}"></div>

                                        </div>
                                    @endforeach
                                    @else
                                        
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" src="{{$product->firstImage()}}" alt="No Product Image">
                                    </div>
                                    @endif
                                </div>
                                @if ($product->imagesCount() > 1)
                                <a class="carousel-control-prev" href="#pdSS" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#pdSS" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h1>{{$product->name}} <small>{!! $product->dispKind() !!}</small></h1>
                            
                            @auth
                            <div class="btn-group"><a href="{{route("products.edit",$product->id)}}" class="btn btn-warning">แก้ไขข้อมูลสินค้า</a>
                            <form action="{{ route('products.toggle-stock', $product) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-{{$product->stockStatusClass()}}">ปรับสถานะสินค้า</button>
                            </form></div>
                            @endauth
                            @if ($product->status === 'in stock')
                                สถานะ: <b class="text-success">มีสินค้า</b><br>
                                {{$product->displayPrice()}}
                            @elseif($product->status === 'out of stock')
                                สถานะ: <b class="text-danger">สินค้าหมด</b>
                            @endif
                        
                            <hr>
                            <div id="product-description">{!! $product->description !!}</div>
                        </div>
                    </div>
                
                </div>{{-- End card body --}}
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                    <div class="col">
                        สั่งซื้อสินค้า Grassstation ได้ที่ Line@ <code>@@Grassstation</code>
                    </div>
                    <div class="col text-right">
                        <a target="_blank" class="btn btn-link" href="{{url('https://order.grassstation.xyz/pickup')}}" role="button">สั่งซื้อสินค้าผ่าน LINE</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection