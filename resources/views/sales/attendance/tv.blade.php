@extends('people.attendance.index')

@section('title') Product Availability @endsection

@section('peopleAttendance')
    
    <!-- TITLE -->
    <!--div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl leading-9 font-bold tracking-wide text-gray-100 sm:leading-10">
            People Overview
        </h2>
    </div-->
    <!-- TITLE END -->

    <div style="margin-top: 120px;"></div>

    <div class="mt-2 embed-responsive xl:aspect-ratio-16/11 xxl:aspect-ratio-21/9">
         <iframe id="iframe" class=" xl:px-4 xxl:px-6 embed-responsive-item" src="https://app.powerbi.com/reportEmbed?reportId=6ddd1790-959a-4100-8d56-039cf9d0aca3&autoAuth=true&ctid=b54c4b8c-01d0-4951-b448-22a5e48ea8d2&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLXNvdXRoLWVhc3QtYXNpYS1iLXByaW1hcnktcmVkaXJlY3QuYW5hbHlzaXMud2luZG93cy5uZXQvIn0%3D" frameborder="0" allowFullScreen="true" style="margin: 0 auto;"></iframe>
    </div>
    
@endsection
