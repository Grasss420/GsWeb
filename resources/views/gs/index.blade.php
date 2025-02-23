@extends('layouts.gs')

@section('title') ร้านขายกัญชา Grassstation คลองสี่ปทุมธานี @endsection

@section('head')

<meta name="og:image" content="{{asset("storage/gsi/mJgtq7xCCBvmDxyi2bQa2KCtkKtr57xJUyYHDNut.jpg")}}">
<meta name="description" content="ร้านขายกัญชา Grassstation เป็นร้านขายกัญชาที่ตั้งอยู่ที่ปากซอยคลองสี่ มีบริการส่งสินค้าในบริเวณใกล้เคียง อ.ธัญบุรี จังหวัดปทุมธานี">
<meta name="keywords" content="ร้านขายกัญชาใกล้ฉัน,ร้านขายกัญชา,ขายกัญชา,กัญชา,ร้านขายกัญชาไกล้ฉ้น,ร้านขายกัญชา,คาเฟ่กัญชาใกล้ฉัน,คาเฟ่กัญชา กัญชาราคาถูก ซื้อกัญชา ซื้อกัญชาราคาถูก ฟาร์มกัญชา ฟาร์มกัญชาใกล้ฉัน คลับกัญชา คลับกัญชาใกล้ฉัน,Weed , cannabis store nearme ,Cannabis dispensary nearme,Cannbis dispensary , cannabis , weed , dap , oil , thc , cbd , lean ,Grassstation , ร้านขายกัญชารังสิต , ร้านขายกัญชาคลอง1 , ร้านขายกัญชาคลอง2 , ร้านขายกัญชาคลอง 3 , ร้านขายกัญชาคลอง4 ร้านขายกัญชาคลอง5 , ร้านขายกัญชาคลอง6 , ร้านขายกัญชาคลอง7 , ร้านขายกัญชานครนายก , ร้านขายกัญชาราคาถูก , ร้านขายกัญชาราคาส่ง , เนื้อ , ร้านขายเนื้อ , เนื้อราคาถูก , เนื้อราคาส่ง , ซื้อกัญชาที่ไหน , กัญชาที่ไหน , เมากัญ , เพื่อนกัญ , สหายกัญ , กัญชาออแกนิค, Co-Working Space กัญชา"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        ยินดีต้อนรับสู่เว็บไซต์ Grassstation
                    </div>
                    <div class="card-body">
                        <h1 style="font-size: 24pt">หน้าหลักเว็บไซต์ Grassstation</h1>
                        <p class="lead">⚠ เราให้ความสำคัญกับการปฏิบัติตามกฎหมายและข้อบังคับที่เกี่ยวข้องทั้งหมด เพื่อให้สอดคล้องกับกฎหมายว่าด้วยการโฆษณาผลิตภัณฑ์กัญชาและกัญชง เราจึงจำกัดการแสดงข้อมูลผลิตภัณฑ์บางประเภทบนเว็บไซต์นี้และระงับการเผยแพร่สื่อโฆษณาออกไป</p>
                        {{-- <div id="gs-slideshow" class="carousel slide" data-ride="carousel">
                            <h3>สินค้าแนะนำล่าสุด</h3>
                            <div class="carousel-inner" role="listbox">
                                @php
                                    $pd = \Grassstation\Models\Product::qHomeP();
                                    $i = true;
                                @endphp
                                @foreach ($pd as $product)
                                    
                                <div class="carousel-item{{$i ? " active" : ""}}">
                                    <a href="{{$product->getURL()}}">
                                        <div title="{{$product->name}} {{$product->getKind()}} ({{$product->displayPrice(true)}})" class="img-item" oncontextmenu="return false" style="background-image:url('{{$product->firstImage()}}')">
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
                        </div> --}}
                        <hr>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-3 col-8">
                                    <a class="btn btn-primary btn-block" href="{{route("menu")}}" role="button">ดูเมนูสินค้า</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-center">ขออภัยในความไม่สะดวกที่เกิดขึ้น หากท่านมีข้อสงสัยเร่งด่วน หรือต้องการข้อมูลเพิ่มเติมเกี่ยวกับผลิตภัณฑ์ โปรดติดต่อเราโดยตรง เรายินดีให้ความช่วยเหลืออย่างเต็มที่</p>
                        {{-- <p class="text-center">
                            <strong>รับชำระเงินด้วย:</strong> เงินสด เงินโอน สแกนจ่าย<br>
                            <b>Payments accepted:</b> Cash, Bank Transfer, Thai QR Payment (PromptPay), Venmo, CashApp, Zelle</p> --}}
                        <span class="sr-only">
                        ร้านขายกัญชาใกล้ฉัน,ร้านขายกัญชา,ขายกัญชา,กัญชา,ร้านขายกัญชาไกล้ฉ้น,ร้านขายกัญชา,คาเฟ่กัญชาใกล้ฉัน,คาเฟ่กัญชา กัญชาราคาถูก ซื้อกัญชา ซื้อกัญชาราคาถูก ฟาร์มกัญชา ฟาร์มกัญชาใกล้ฉัน คลับกัญชา คลับกัญชาใกล้ฉัน,Weed , cannabis store nearme ,Cannabis dispensary nearme,Cannbis dispensary , cannabis , weed , dap , oil , thc , cbd , lean ,Grassstation , ร้านขายกัญชารังสิต , ร้านขายกัญชาคลอง1 , ร้านขายกัญชาคลอง2 , ร้านขายกัญชาคลอง 3 , ร้านขายกัญชาคลอง4 ร้านขายกัญชาคลอง5 , ร้านขายกัญชาคลอง6 , ร้านขายกัญชาคลอง7 , ร้านขายกัญชานครนายก , ร้านขายกัญชาราคาถูก , ร้านขายกัญชาราคาส่ง , เนื้อ , ร้านขายเนื้อ , เนื้อราคาถูก , เนื้อราคาส่ง , ซื้อกัญชาที่ไหน , กัญชาที่ไหน , เมากัญ , เพื่อนกัญ , สหายกัญ , กัญชาออแกนิค, Co-Working Space กัญชา คลองสี่,กัญชาลำลูกกา</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        ติดต่อเรา
                    </div>
                    <div class="card-body">
                        <h4 class="sr-only">ช่องทางการติดต่อ</h4>
                        <h4 class="card-title">Line@: <a href="https://line.me/R/ti/p/@884ccqbw" target="_blank">@Grassstation</a></h4>
                        <img src="img/gsqr.png" class="img-fluid qr-block" alt="QR Code">
                        
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-block btn-link" href="https://line.me/R/ti/p/@884ccqbw" target="_blank" role="button">ติดต่อเราผ่าน Line</a>
                        <hr><h4 class="card-title">Operating Hours <sub>(<span class="sr-only">Operating in </span>UTC+7<span class="sr-only"> Timezone</span>)</sub></h4>
                        
                        <ul class="list-unstyled">
                            <li>
                                <strong>Shop:</strong> Open 8:00 AM &ndash; 24:00 AM (เที่ยงคืน)
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- <div class="card">
                    <div class="card-header">
                        Business Hours
                    </div>
                    <img src="https://grassstation.xyz/storage/gsi/cAMq2hAArfmIRLugS6PcaMFNuPzixMjebZWVmLN0.jpg" loading="lazy" alt="Grassstation Café Welcomes Everyone over 20 years old">
                    <div class="card-body">
                        <h4 class="card-title">Operating Hours <sub>(<span class="sr-only">Operating in </span>UTC+7<span class="sr-only"> Timezone</span>)</sub></h4>
                        
                        <ul class="list-unstyled">
                            <li>
                                <strong>Shop:</strong> Open 24 hours
                            </li>
                            <li>
                                <strong>Café<span class="sr-only"> &amp; Co-Working Space</span>:</strong> 8:00 AM to 10:00 PM <sup>Free Wi-Fi*<span class="sr-only"> Available at Café With any Purchase</span></sup>
                            </li>
                            <li>
                                <strong>Delivery:</strong> 6:30 AM to 2:00 AM
                            </li>
                            <li class="d-none">
                                <strong>Food &amp; Café:</strong> <small><a href="https://maps.app.goo.gl/8rdpWusvmCENTMd16" target="_blank">กาแฟสด Wat Caf’e วัฒน์คาเฟ่ สาขา 146</a></small>
                            </li>
                        </ul>
                    </div> --}}
                    {{-- <div class="card-footer">
                        <sub>* Free Wi-Fi Available at Café With any Purchase</sub>
                    </div> 
                </div>--}}
                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Google Maps
                    </div>
                    <div class="card-body">
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d968.1892969645776!2d100.6881947695446!3d14.017708900318395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d7f561c973403%3A0x45b82de71f304876!2zR3JlZW5MYW5kIOC4o-C5ieC4suC4meC4guC4suC4ouC4geC4seC4jeC4iuC4siDguJXguKXguLLguJTguYDguKHguLfguK3guIfguYPguKvguKHguYjguITguKXguK3guIc0IC0gQ2FubmFiaXMgc3RvcmU!5e0!3m2!1sen!2sth!4v1740332783175!5m2!1sen!2sth" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Government Warning Disclaimer
                    </div>
                    <div class="card-body">
                        <h4 class="card-title sr-only">Government Warning Disclaimer</h4>
                        <p class="card-text">ผู้ที่ใช้งานเว็บไซต์นี้ต้องมีอายุมากกว่า 20 ปีขึ้นไป
                        <hr>
                        เว็บไซต์นี้จัดทำเพื่อให้ข้อมูลกัญชาเพื่อการศึกษาและข้อมูลทั่วไปแก่ประชาชนเท่านั้น มิได้มีจุดประสงค์เพื่อจำหน่ายสินค้าผ่านระบบออนไลน์หรือส่งเสริมการขายกัญชาใดๆทั้งสิ้น ผู้ที่ซื้อกัญชาในประเทศไทยต้องมีอายุตั้งแต่ 20 ปีขึ้นไปและไม่ได้ตั้งครรภ์อยู่</p>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection