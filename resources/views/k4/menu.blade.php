<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="//static.monolidthz.com/generic/css/HelveticaNeueLTCom_ChromeCompat.css" rel="stylesheet" />
  <title>เมนูกัญชา Grassstation สาขาคลองสี่</title>
	<style>
		.footer { background-color: #f5f5f5; padding-top:10px;}
		.bg-grasss{background:#507c58;color:#d7d7d5;}
	</style>
</head>
<body>
<nav class="navbar navbar-dark bg-grasss">
  <a class="navbar-brand" href="#">
    <img src="https://grassstation.xyz/img/gs.png" height="40" class="d-inline-block align-top" alt="Grassstation Logo">
  </a>
    <span class="navbar-text">
	  Grassstation Khlong 4
    </span>
</nav>
  <div class="container my-5">
@php
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
        @include('components.elRow',['product'=>$product])
        @endforeach
        <tr>
            <th scope="row" colspan="100%" class="text-center">สินค้าราคาไม่เกิน 200 บาท</th>
        </tr>
        
        @foreach ($u1 as $product)
        @include('components.elRow',['product'=>$product])
        @endforeach
        <tr>
            <th scope="row" colspan="100%" class="text-center">สินค้าราคาไม่เกิน 200 บาท</th>
        </tr>
        @foreach ($u2 as $product)
        @include('components.elRow',['product'=>$product])
        @endforeach
    </tbody>
</table>
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
<script>
	if (location.protocol != 'https:')
	{
	 location.href = 'https:' + window.location.href.substring(window.location.protocol.length);
	}
</script>
</body>
</html>
