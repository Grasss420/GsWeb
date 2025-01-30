
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>503 Information System Unavailable</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
<link href="//static.monolidthz.com/generic/css/HelveticaNeueLTCom_ChromeCompat.css" rel="stylesheet" />
<style type="text/css">
@import url('//static.monolidthz.com/generic/css/fonts.min.css');
::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }
body {
	background-color: #2d4535;
}
body:after {
	content: "";
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	z-index: 1000;
	background: repeating-linear-gradient(0deg, #111 0px, #111 1px, transparent 2px, transparent 5px);
	background-size: 100% 5px;
			animation: lines 2s ease-out infinite;
	opacity: 0.3;
	mix-blend-mode: color-burn;
	pointer-events: none;
}
body .text, body .text > * {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}
body .text > * {
	font-size:5vw;
	font-family: "Visitor TT1 BRK","Visitor",monospace;
			animation: giggle 1s ease infinite;
	mix-blend-mode: difference;
}
body .text .r {
	color: #f00;
	left: -0.5px;
}
body .text .g {
	color: #0f0;
			animation-delay: -0.67s;
}
body .text .b {
	color: #00f;
			animation-delay: -0.33s;
	left: 0.5px;
}
footer{
	color: #eee;
	position: fixed;
	bottom: 0;
	padding: 15px;
	/*text-shadow: #D0D0D0 5px 5px 5px;*/
}

@keyframes giggle {
	0%, 100% {
		transform: translate(-50%, -50%) translateY(-2px);
	}
	50% {
		transform: translate(-50%, -50%) translateY(2px);
	}
}
@keyframes lines {
	0% {
		background-position: 0px 0px;
	}
	100% {
		background-position: 0px 25px;
	}
}
body {
	margin: 40px;
	font: 13px/20px normal "Helvetica Neue",Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	font-family: "Visitor TT1 BRK","Visitor",monospace;
	color: #00f4ff;
	font-size: 1.25rem;
	background-color: transparent;
	font-weight: normal;
}


h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}
.gs-logo{
    max-height: 65vh;
}

</style>
</head>
<body>
    <div class="container-fluid" id="container">
        <div class="row">
            <div class="col">
                <a href="{{route('root')}}">
                <img src="{{asset('img/gs.png')}}" class="img-fluid gs-logo" alt="Grasssation Logo">
                </a>
            </div>
        </div>
    </div>
    
    <div class="text">
        <div class="r">Service Unavailable</div>
        <div class="g">Service Unavailable</div>
        <div class="b">Service Unavailable</div>
    </div>
	<!--<div id="container">
		<p>The page you requested was not found.</p>		ส่ิ่งที่คุณกำลังตามหามันบ่ได้อยุ่ในนี้เด้อ
	</div>-->
	
	<footer>
		Copyright © <a href="{{route('root')}}">Grassstation</a> Information System 2022-{{date("Y")}}	</footer>
</body>
</html>