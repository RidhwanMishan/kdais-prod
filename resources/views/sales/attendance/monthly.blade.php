@extends('people.attendance.index')

@section('title') People Attendance Dashboard (Monthly) @endsection

@section('peopleAttendance')
    <div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl leading-9 font-bold tracking-wide text-gray-100 sm:leading-10">
            Late Attendance (Monthly)
        </h2>
    </div>
    <div class="mt-2 min-h-screen min-w-full">
        <iframe id="iframe" class=" xl:px-4 xxl:px-6 min-h-screen min-w-full" src="https://prod-apnortheast-a.online.tableau.com/t/csranalytics/views/Lateattendancemonthly/LateMonthly?iframeSizedToWindow=true&:embed=y&:refresh&:showAppBanner=false&:display_count=n&:showVizHome=n&:origin=viz_share_link"></iframe>
    </div>
@endsection
