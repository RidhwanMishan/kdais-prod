@extends('sales.index')

@section('title') Product Availability SKU Based @endsection

@include('includes.sso' , ["reportId" => "db576af1-e48c-4e99-b96e-bf1ee8ad2a5f", "datasetId" => "75b9e1ca-f6d0-4342-8510-a0bca432d52a"])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-16/11">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection