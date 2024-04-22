@extends('people.leaves.index')

@section('title') People Leaves Dashboard (Daily) @endsection

@section('peopleLeaves')
    <div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl leading-9 font-bold tracking-wide text-gray-100 sm:leading-10">
            Emergency, Sick & Unpaid Leave (Daily)
        </h2>
    </div>
    <div class="mt-2 embed-responsive aspect-ratio-16/10">
        <iframe id="iframe" class=" xl:px-4 xxl:px-6 embed-responsive-item" src="https://prod-apnortheast-a.online.tableau.com/t/csranalytics/views/EmergencySickUnpaidLeaveDaily/Daily?iframeSizedToWindow=true&:embed=y&:refresh&:showAppBanner=false&:display_count=n&:showVizHome=n&:origin=viz_share_link"></iframe>
    </div>
@endsection
