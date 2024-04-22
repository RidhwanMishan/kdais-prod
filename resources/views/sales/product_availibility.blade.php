@extends('sales.index')

@section('title') Product Availability Dealer Based @endsection

@include('includes.sso' , ["reportId" => "b00408a8-eb8b-4e4e-9535-1c735644d068", "datasetId" => "d74743fc-8858-4e61-b39b-a63d17929519"])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-16/11">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection