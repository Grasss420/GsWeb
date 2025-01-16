{{-- Note to self: this page is deprecated --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
		<meta name="description" content="ร้านขายกัญชา Grassstation เป็นร้านขายกัญชาที่ตั้งอยู่ในหมู่บ้านพลีโน่ตำบลคลองสี่ มีบริการส่งสินค้าในบริเวณไกล้เคียง">
		<meta name="keywords" content="ร้านขายกัญชา, ซื้อกัญชา, สั่งซื้อกัญชา"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="canonical" href="https://grassstation.xyz/">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
		<script type="application/ld+json">
			{
			  "@context": "https://schema.org",
			  "@type": "Organization",
			  "name": "ร้านขายกัญชา Grassstation",
			  "url": "https://grassstation.xyz/",
			  "logo": "https://grassstation.xyz/img/gs.png",
			  "contactPoint": {
				"@type": "ContactPoint",
				"telephone": "+66-987-999-420",
				"contactType": "customer service"
			  }
			}
    	</script>
        <meta http-equiv="refresh" content="120">
        <title>ร้านขายกัญชา Grassstation ตำบลคลองสี่ จังหวัดปทุมธานี</title>
        <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon-16x16.png">
        <link rel="manifest" href="./site.webmanifest">
        <!-- Fonts -->
		<link href="//static.monolidthz.com/generic/css/HelveticaNeueLTCom_ChromeCompat.css" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<link href="css/grasslayout.css" rel="stylesheet" />
		<link href="css/grassstation.css" rel="stylesheet" />

      
        <style>
            body {
                font-family: 'Helvetica Neue',Helvetica,arial, sans-serif;
            }
        </style>
    </head>
    <body class="bg-dark">
        
    
<header class="site-header sticky-top py-1">
    <nav class="container d-flex flex-column flex-md-row justify-content-between">
      <a class="py-2" href="#" aria-label="Product">
        <img id="gs-logo" src="img/logo.png">
      </a>
      <a class="py-2 d-none d-md-inline-block" href="{{route("menu")}}">Menu</a>
      <!--<a class="py-2 d-none d-md-inline-block" href="#">Contact</a>
      <a class="py-2 d-none d-md-inline-block" href="#">Payments</a>
      <a class="py-2 d-none d-md-inline-block" onclick="Web3Login()">e</a>-->
    </nav>
  </header>
  
  <main>
    <div class="container-fluid">
        <div class="row justify-content-evenly">
			<div class="sr-only">
				<h1>ร้านขายกัญชา Grassstation ตำบลคลองสี่ จังหวัดปทุมธานี</h1>
			</div>
            <div class="col-md-10 mx-auto bg-trans">
              <!--<div class="card" style="width: 18rem;">
                <div class="card-header">
                  Featured
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">An item</li>
                  <li class="list-group-item">A second item</li>
                  <li class="list-group-item">A third item</li>
                </ul>
              </div>-->
              <div id="gs-slideshow" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="img-item" style="background-image:url('https://cdn.discordapp.com/attachments/696176688744235009/1074251054369230878/1676191752419.jpg')" alt="..."></div>
                  </div>
                  <!--<div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/photo_2022-09-29_21-21-03.jpg')" alt="..."></div></div>
                   <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/photo_2022-09-29_21-21-24.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/49db4eae89962b45c7e0cae2758c8220.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/73f1c58c746fdb2f40131e7195d26ced.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/8bf24bfc28c1891f02517a3f04cd0c98.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/8d02d9e60870172f0b2b9db5a2d77153.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/b9adf398bd7827265a45d868b1075fcc.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/cc6a40c09bc8f0eadb23a6bbdf498a91.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/d8ef06639ba7ccc71d9a55f8a820655f.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/f262c5c9f597264f4e146d9e01909cd6.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/f333074abd415092572afebc90a3a352.jpg')" alt="..."></div></div>
                  <div class="carousel-item"><div class="img-item" style="background-image:url('{{env("GS_DISP")}}/fa8a347032a63ae702b8f5691f50c014.jpg')" alt="..."></div></div>-->
                  
                </div>
              </div>
            </div>
            <div class="col bg-trans">
              <!--<img src="img/qrgrasscn.jpg" class="img-fluid center-block" alt=""><br>&nbsp;-->
              <nav class="ndark">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">OpenChat</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Line@</button>
                </li>
              </ul>
            </nav>
              <div class="tab-content bg-light" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                  <img src="img/gsat.jpg" class="img-fluid qr-block" alt="">
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                  
                  <h3 class="text-center">Line@: 884ccqbw</h3>
                  <img src="img/gsqr.png" class="img-fluid qr-block" alt="">
                </div>
              </div>
            </div>
        </div>
    </div>
  
  
  </main>
  
  <footer class="container-fluid fixed-bottom" id="gs-footer">
    <div class="row">
      <div class="col">
        <span class="gs-logo">
          <img src="img/gs.png" class="img-fluid" alt="">
          .xyz
        </span>
      </div>
      <div class="col-10 col-md gstex">
		  <span class="d-block mb-3"><a href="https://sarkhan.wiki/Grassstation">Wiki</a> &nbsp;|&nbsp; &copy; Grassstation 2022-2023 &nbsp; 8/69 Khlong Si, Bueng Yitho Subdistrict, Khlong Luang District, Pathum Thani 12120 &nbsp; 🇹🇭Thailand
			
		  </span>
      </div>
      <div class="col"><a href="https://maps.app.goo.gl/u1HeHawbGhDcPqHj9" target="_blank">Google Maps</a><!--GSW&nbsp;{{time()}}--></div>
    </div>
  </footer>
  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>
