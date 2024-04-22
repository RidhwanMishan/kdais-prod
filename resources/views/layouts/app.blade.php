<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Khind Dashboard - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content=".">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/khind.ico') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @if(isset($userName))
    <style>

    </style>
    @endif

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels" defer></script>
</head>

@if(isset($userName))
<!-- <body class="relative hidden xxlll:hidden xl:block md:bg-no-repeat md:bg-top"  onload="startTime()"> -->
<body class="relative"  onload="startTime()">

    @if(isset($userName))
    <style>

    </style>
    @endif

    <div>
        <div class="object-bottom header-all">
            <nav  x-data="{ open: false }"  @keydown.window.escape="open = false" class="bg-transparent">
                <div class="mx-auto xxxl:mt-8 xxll:mt-12  sm:px-6 xl:px-8" >
                    <!-- <div class="hidden xxlll:hidden xl:flex items-center justify-between h-16 px-4 sm:px-0"> -->
                    <div class="md:flex items-center justify-between h-16 px-4 sm:px-0">
                        <!-- <div class="hidden xxlll:hidden xl:flex items-center"> -->
                        <div class="md:flex items-center">
                            <div class="md:flex-shrink-0">
                                <img class="khind-logo" src="{{ asset('images/khind-logo-white.svg') }}" alt="Khind Logo" />
                            </div>
                            <div>
                            <!--div class="hidden xxlll:hidden xl:block"-->
                                <div class="xl:ml-8 xxl:ml-12 xxlll:hidden md:flex items-baseline">
                                <!--div class="xl:ml-8 xxl:ml-12 hidden xxlll:hidden xl:flex items-baseline"-->
                                    <a href="/" class="uppercase xl:text-md xsl:text-lg xxxl:text-2xl xxll:text-3xl font-semibold topnavmobile topnavmobileori hidden xxlll:hidden md:flex items-baseline text-white">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span class="ml-2">Home</span>
                                    </a>

                                    @if($dealer_access)
                                    <a href="/sales/dealer" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-lg xxxl:text-xl xxll:text-2xl ml-5 text-white @isset($sales) bg-white @endisset">Dealer Penetration</a>
                                    @endif

                                    @if($product_access)
                                    <a href="/sales/product_availibility/dealer" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-lg xxxl:text-xl xxll:text-2xl ml-5 text-white @isset($sales_product) bg-white @endisset">Product Availability</a>
                                    @endif

                                    @if($business_report_access)
                                    <a href="/sales/business_report/sales_tracker" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-lg xxxl:text-xl xxll:text-2xl ml-5 text-white @isset($business_report) bg-white @endisset">Business Report</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="inline-flex justify-end">
                            <div class="md:hidden xl:flex">
                                <div id="txt" class="xl:mt-2 xxxl:mt-4 xxll:mt-6 uppercase xl:text-md xsl:text-lg xxl:text-lg xxxl:text-2xl xxll:text-3xl font-semibold xl:px-2 xxl:px-3 xl:py-2 xxl:py-2 rounded-md text-sm xl:ml-2 xxl:ml-6 text-white">
                                    
                                </div>
                            </div>

                            <div class="hidden xxlll:hidden lg:block">
                                <div class="xl:ml-2 xxl:ml-4 hidden xxlll:hidden md:flex items-center">
                                    <div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('signout') }}" class="block text-gray-700" onclick="event.preventDefault();
                            document.getElementById('logout-form-big').submit();"><div class="uppercase xl:text-md xsl:text-lg xxxl:text-2xl xxll:text-3xl font-semibold topnavmobile topnavmobileori hidden xxlll:hidden md:flex items-baseline text-white">Log Out</div></a>

                            <form id="logout-form-big" action="{{ route('signout') }}" method="GET" class="hidden">
                                {{ csrf_field() }}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
			
			@isset($sales_product)
			<div class="mx-auto px-2 sm:px-1 lg:px-4">
				<div class="flex px-2 py-2 sm:px-1 product-2">
					<a href="/sales/product_availibility/dealer" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-l xxxl:text-l xxll:text-xl ml-2 border-black bg-white @isset($product) bg-green @endisset" >Dealer Based</a>
					<a href="/sales/product_availibility/sku" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-l xxxl:text-l xxll:text-xl ml-2 border-black bg-white @isset($product2) bg-green @endisset" >SKU Based</a>
                    <a href="/sales/product_availibility/location" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-l xxxl:text-l xxll:text-xl ml-2 border-black bg-white @isset($product3) bg-green @endisset" >Location Based</a>
				</div>
			</div>
			@endisset

            @isset($business_report)
			<div class="mx-auto px-2 sm:px-1 lg:px-4">
				<div class="flex px-2 py-2 sm:px-1 product-2">
					<a href="/sales/business_report/sales_tracker" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-l xxxl:text-l xxll:text-xl ml-2 border-black bg-white @isset($sales_tracker) bg-green @endisset" >Sales Performance Tracker</a>
                    <a href="/sales/business_report/sales_cycle" class="uppercase topnavmobile topnavmobileori xl:text-base xxl:text-l xxxl:text-l xxll:text-xl ml-2 border-black bg-white @isset($sales_cycle) bg-green @endisset" >Sales Cycle</a>
				</div>
			</div>
			@endisset

        </nav>
    </div>

    <!-- @include('partials.alert') -->
    @yield('content')

</div>





<script>
    function startTime() {
        var weekday = new Array(7); weekday[0] = "Sunday"; weekday[1] = "Monday"; weekday[2] = "Tuesday"; weekday[3] = "Wednesday"; weekday[4] = "Thursday"; weekday[5] = "Friday"; weekday[6] = "Saturday";
        var hour = new Array(24);
        hour[0] = 12; hour[1] = 1; hour[2] = 2; hour[3] = 3; hour[4] = 4; hour[5] = 5; hour[6] = 6; hour[7] = 7; hour[8] = 8; hour[9] = 9; hour[10] = 10; hour[11] = 11; hour[12] = 12; hour[13] = 1; hour[14] = 2; hour[15] = 3; hour[16] = 4; hour[17] = 5; hour[18] = 6; hour[19] = 7; hour[20] = 8; hour[21] = 9; hour[22] = 10; hour[23] = 11;

        var today = new Date();
        var y = today.getFullYear();
        var mon = today.getMonth();
        var date = today.getDate();
// var day = weekday[today.getDay()];
var hour24h = today.getHours();
var h = hour[today.getHours()];
var m = today.getMinutes();
var s = today.getSeconds();
var ampm;
if (hour24h<13){
    ampm = "am";
}else if(12<hour24h){
    ampm = "pm";
}
m = checkTime(m);
s = checkTime(s);
mon =checkTime(mon+1);
date = checkTime(date);
document.getElementById('txt').innerHTML =
"   " +date+"/"+mon+"/"+y + " -  "+ h + ":" + m + " " + ampm;
var t = setTimeout(startTime, 500);
}
function checkTime(i) {
if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
return i;
}
</script>

<script>
    @yield('script')

</script>

<script>


    const lti_launch_urls = data['lti_launch_urls'];
    const loadNextIframe = index => {
        if (index >= lti_launch_urls.length) return;

        const launch_url = lti_launch_urls[index];
        const iframe = document.createElement('iframe');

        iframe.sandbox = "allow-same-origin allow-scripts allow-popups allow-forms";
        iframe.width = "100%";
        iframe.frameBorder = "0";
        iframeId = "iframe-" + index;
        iframe.id = iframeId;
        iframe.src = launch_url;

        iframe.addEventListener('load', () => loadNextIframe(++index));

        document.body.appendChild(iframe);
        iframe.contentWindow.postMessage(style, "*");
    };

    loadNextIframe(0);

</script>

@else

<body>
    @include('partials.alert')
    @yield('content')

    @endif
</body>
</html>