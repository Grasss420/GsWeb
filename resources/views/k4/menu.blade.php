<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
  <link href="//static.monolidthz.com/generic/css/HelveticaNeueLTCom_ChromeCompat.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('css/win95.css')}}">
  <link rel="stylesheet" href="{{asset('css/grassstation.css')}}?{{date("w-m")}}">
  <title>เมนูกัญชา Grassstation สาขาคลองสี่</title>
	<style>
		.footer { background-color: #f5f5f5; padding-top:10px;}
		.bg-grasss{background:#507c58;color:#d7d7d5;position: sticky !important;}
	</style>
</head>
<body>
    <a id="top"></a>
<nav class="navbar navbar-dark bg-grasss">
  <a class="navbar-brand" href="{{route('root')}}">
    <img src="https://grassstation.xyz/img/gs.png" height="40" class="d-inline-block align-top" alt="Grassstation Logo">
  </a>
    <span class="navbar-text">
	  Grassstation Khlong 4
    </span>
</nav>
  <div class="container-fluid" style="position: relative">
<div class="row">
    <div class="col" style="position: sticky;top:0;bottom:0;left:0;right:0;">
        <div id="gs-slideshow" class="carousel slide gsK4-slideshow" data-ride="carousel" style="display:block">
            <div class="carousel-inner" role="listbox">
                @php
                    $pd = \Grassstation\Models\Product::qHomePM();
                    $i = true;
                @endphp
                @foreach ($pd as $product)
                    
                <div class="carousel-item{{$i ? " active" : ""}}">
                    <a href="{{$product->getURL()}}">
                        <div title="{{$product->name}} {{$product->getKind()}} ({{$product->displayPrice(true)}})" class="img-item" style="background-image:url('{{$product->firstImage()}}');background-size:cover">
                            <img class="d-none" loading="lazy" src="{{$product->firstImage()}}" alt="Product Image for {{$product->name}}">&nbsp;
                        </div>
                    </a>
                </div> @php $i = false; @endphp @endforeach
            </div>
            <a class="carousel-control-prev" href="#gs-slideshow" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#gs-slideshow" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <div class="col">
@php
$i = 0;
//get featured menu
$fp = \Grassstation\Models\Product::Featured()->OrderByDesc("price_per_gram")->OrderBy("internal_sku")->get();
$u1 = \Grassstation\Models\Product::getU1();$u2 = \Grassstation\Models\Product::getU2();
@endphp

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fp as $product)
        @include('components.elRow',['product'=>$product,'i'=>&$i])
        @endforeach
        <tr>
            <th scope="row" colspan="100%" class="text-center">สินค้าราคาไม่เกิน 200 บาท</th>
        </tr>
        
        @foreach ($u2 as $product)
        @include('components.elRow',['product'=>$product,'i'=>&$i])
        @endforeach
        <tr>
            <th scope="row" colspan="100%" class="text-center">สินค้าราคาไม่เกิน 100 บาท</th>
        </tr>
        @foreach ($u1 as $product)
        @include('components.elRow',['product'=>$product,'i'=>&$i])
        @endforeach
    </tbody>
</table>
  </div>
</div>
</div>
    <footer class="footer">
      <div class="container">
        <span class="text-muted">Copyright&copy; 2022-2024 <a href="http://https://wiki.spkz.monolidthz.com/Grasss_Network" target="_blank" rel="noopener noreferrer">Grasss Network</a>. &nbsp; | &nbsp;</span>
		  <ul class="list-inline" style="display: inline-block;">
			  <li class="list-inline-item"><a href="{{route('root')}}">สาขาหลัก</a></li>
			  <li class="list-inline-item"><a href="#">สาขาคลองสอง</a></li>
			  <li class="list-inline-item"><a href="{{route('k4.root')}}">สาขาคลองสี่</a></li>
			  <!--<li class="list-inline-item"><a href="https://grass.whiteglassware.net">สาขาบางกรวย</a></li>-->
			</ul>
      </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
<script>$(document).ready(function () {
    // Set scroll position to 0
    $("html, body").animate({
        scrollTop: 0
    }, 1000, function() {
        // Scroll to the end of the page after scrolling to the top
        $("html, body").animate({
            scrollTop: $(document).height()
        }, 80000);
    });

    // Refresh the page after 1 minute
    setTimeout(, 60000);
});
</script>
</body>
</html>
