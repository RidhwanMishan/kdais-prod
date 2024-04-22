@extends('people.index')

@section('title') People Medical Expenses Dashboard @endsection

@section('peopleContent')
    <div class="max-w-screen-xl mx-auto text-center px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl leading-9 font-bold tracking-wide text-gray-100 sm:leading-10">
            Medical Expenses
        </h2>
    </div>
    <div class="mt-2 embed-responsive aspect-ratio-5/4 ">
        <iframe id="iframe" class=" xl:px-4 xxl:px-6 embed-responsive-item" src="https://prod-apnortheast-a.online.tableau.com/t/csranalytics/views/MedicalExpensesDashboard/Dashboard?iframeSizedToWindow=true&:embed=y&:refresh&:showAppBanner=false&:display_count=n&:showVizHome=n&:origin=viz_share_link"></iframe>
    </div>
@endsection
