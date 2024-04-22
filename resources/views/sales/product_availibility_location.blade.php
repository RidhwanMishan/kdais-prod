@extends('sales.index')

@section('title') Product Availability Location Based @endsection

@include('includes.sso' , ["reportId" => "03917aed-475c-4e7c-b5ab-44acb3f9acaf", "datasetId" => "fa9cb5dd-df3e-4885-a46c-7bc97d7a3d18"])

@section('frameContent')

<div class="mt-2 embed-responsive md:aspect-ratio-16/11">
    <div id="reportContainer" class="xl:px-4 xxl:px-6 embed-responsive-item" frameborder="0" allowFullScreen="true" style="margin: 0 auto;">
    </div>
</div>

@endsection