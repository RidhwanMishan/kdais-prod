@extends('layouts.app')

@section('content')
    <div class="-mt-32 bg-transparent">
        <div class="h-full pt-8 xxxl:pt-20 mx-auto bg-transparent">

            <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="{{ asset('js/powerbi.js') }}"></script>

            <div style="margin-top: 94px;"></div>

            <!-- <div class="mt-2 embed-responsive md:aspect-ratio-5/3">
                <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
                </div>
            </div> -->

            @yield('frameContent')

            @yield('salesContent')

        </div>
    </div>
@endsection
