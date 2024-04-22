@extends('sales.index')

@section('title') Business Report Sales Performance Tracker @endsection

@include('includes.sso' , ["reportId" => "d99959c8-b16b-4af9-b537-caf91f924280", "datasetId" => "0e6487e2-bd2d-4209-9789-109a34e44546"])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-5/3">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection